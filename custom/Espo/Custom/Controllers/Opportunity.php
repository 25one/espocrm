<?php

namespace Espo\Custom\Controllers;

class Opportunity extends \Espo\Modules\Crm\Controllers\Opportunity
{
    /**
     *  GET api/v1/Opportunity/word/id
     */
    public function actionWord($params, $data, $request)
    {
        $id = $params['id'];
        $entity = $this->getRecordService()->read($id);

        if (!$entity) {
            throw new NotFound();
        }

        $value = $entity->getValueMap();

        $phpWord = new  \PhpOffice\PhpWord\PhpWord(); 
 
        $template = $params['template'];
        $document = $phpWord->loadTemplate('opportunityWord_template' . $template . '.docx'); 

        $document->setValue('name', $value->name); 
        $document->setValue('stage', $value->stage); 

        try {
            $document->saveAs('opportunityWord_result.docx'); 
            return true; 
        } catch (\Exception $e){
            return $e->getCode();
        }
    }    
}