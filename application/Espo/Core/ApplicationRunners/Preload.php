<?php
/************************************************************************
 * This file is part of EspoCRM.
 *
 * EspoCRM - Open Source CRM application.
 * Copyright (C) 2014-2021 Yurii Kuznietsov, Taras Machyshyn, Oleksii Avramenko
 * Website: https://www.espocrm.com
 *
 * EspoCRM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * EspoCRM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with EspoCRM. If not, see http://www.gnu.org/licenses/.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "EspoCRM" word.
 ************************************************************************/

namespace Espo\Core\ApplicationRunners;

use Espo\Core\{
    Utils\Preload as PreloadUtil,
};

use Throwable;

/**
 * Runs a preload.
 *
 * @see https://www.php.net/manual/en/opcache.preloading.php
 */
class Preload implements ApplicationRunner
{
    use Cli;

    public function run() : void
    {
        $preload = new PreloadUtil();

        try {
            $preload->process();
        }
        catch (Throwable $e) {
            $this->processException($e);

            throw $e;
        }

        $count = $preload->getCount();

        echo "Success." . PHP_EOL;
        echo "Files loaded: " . (string) $count . "." . PHP_EOL;
    }

    protected function processException(Throwable $e)
    {
        echo "Error occured." . PHP_EOL;

        $msg = $e->getMessage();

        if ($msg) {
            echo "Message: {$msg}" . PHP_EOL;
        }

        $file = $e->getFile();

        if ($file) {
            echo "File: {$file}" . PHP_EOL;
        }

        echo "Line: " . $e->getLine() . PHP_EOL;
    }
}