<?php

namespace InfyOm\Generator\Generators\Scaffold;

use InfyOm\Generator\Common\CommandData;
use InfyOm\Generator\Generators\BaseGenerator;
use InfyOm\Generator\Utils\FileUtil;

class ControllerGenerator extends BaseGenerator
{
    /** @var CommandData */
    private $commandData;

    /** @var string */
    private $path;

    /** @var string */
    private $templateType;

    /** @var string */
    private $fileName;

    public function __construct(CommandData $commandData)
    {
        $this->commandData = $commandData;
        $this->path = $commandData->config->pathController;
        $this->templateType = config('infyom.laravel_generator.templates', 'adminlte-templates');
        $this->fileName = $this->commandData->modelName.'Controller.php';
    }

    public function generate()
    {
        if ($this->commandData->getAddOn('datatables')) {
            if ($this->commandData->getOption('repositoryPattern')) {
                $templateName = 'datatable_controller';
            } else {
                $templateName = 'model_datatable_controller';
            }

            if ($this->commandData->isLocalizedTemplates()) {
                $templateName .= '_locale';
            }

            $templateData = get_template("scaffold.controller.$templateName", 'laravel-generator');

            $this->generateDataTable();
        } elseif ($this->commandData->jqueryDT()) {
            $templateName = 'jquery_datatable_controller';
            $templateData = get_template("scaffold.controller.$templateName", 'laravel-generator');

            $this->generateDataTable();
        } else {
            if ($this->commandData->getOption('repositoryPattern')) {
                $templateName = 'controller';
            } else {
                $templateName = 'model_controller';
            }
            if ($this->commandData->isLocalizedTemplates()) {
                $templateName .= '_locale';
            }

            $templateData = get_template("scaffold.controller.$templateName", 'laravel-generator');

            $paginate = $this->commandData->getOption('paginate');

            if ($paginate) {
                $templateData = str_replace('$RENDER_TYPE$', 'paginate('.$paginate.')', $templateData);
            } else {
                $templateData = str_replace('$RENDER_TYPE$', 'all()', $templateData);
            }
        }

        $relationModelData = $this->generateItemRelations($this->commandData->relations);
        
        if(!empty($relationModelData)){            
            $templateData = str_replace('$REPOSITORY_REFERENCE_OPTION_ITEM', implode(PHP_EOL,$relationModelData['REPOSITORY_REFERENCE_OPTION_ITEM']), $templateData);
            $templateData = str_replace('$REPOSITORY_OPTION_ITEM_INSTANCE', implode(infy_nl_tab(1, 2),$relationModelData['REPOSITORY_OPTION_ITEM_INSTANCE']), $templateData);
            $templateData = str_replace('$LIST_OPTION_ITEM_INSTANCE', implode(','.infy_nl_tab(1, 3),$relationModelData['LIST_OPTION_ITEM_INSTANCE']), $templateData);
        }
        
        $templateData = fill_template($this->commandData->dynamicVars, $templateData);

        FileUtil::createFile($this->path, $this->fileName, $templateData);

        $this->commandData->commandComment("\nController created: ");
        $this->commandData->commandInfo($this->fileName);
    }

    private function generateDataTable()
    {
        $templateName = ($this->commandData->jqueryDT()) ? 'jquery_datatable' : 'datatable';
        if ($this->commandData->isLocalizedTemplates()) {
            $templateName .= '_locale';
        }

        $templateData = get_template('scaffold.'.$templateName, 'laravel-generator');

        $templateData = fill_template($this->commandData->dynamicVars, $templateData);

        $templateData = str_replace(
            '$DATATABLE_COLUMNS$',
            implode(','.infy_nl_tab(1, 3), $this->generateDataTableColumns()),
            $templateData
        );

        $path = $this->commandData->config->pathDataTables;

        $fileName = $this->commandData->modelName.'DataTable.php';

        FileUtil::createFile($path, $fileName, $templateData);

        $this->commandData->commandComment("\nDataTable created: ");
        $this->commandData->commandInfo($fileName);
    }

    private function generateDataTableColumns()
    {
        $templateName = 'datatable_column';
        if ($this->commandData->isLocalizedTemplates()) {
            $templateName .= '_locale';
        }
        $headerFieldTemplate = get_template('scaffold.views.'.$templateName, $this->templateType);

        $dataTableColumns = [];
        foreach ($this->commandData->fields as $field) {
            if (!$field->inIndex) {
                continue;
            }

            if ($this->commandData->isLocalizedTemplates() && !$field->isSearchable) {
                $headerFieldTemplate = str_replace('$SEARCHABLE$', ",'searchable' => false", $headerFieldTemplate);
            }

            $fieldTemplate = fill_template_with_field_data(
                $this->commandData->dynamicVars,
                $this->commandData->fieldNamesMapping,
                $headerFieldTemplate,
                $field
            );

            if ($field->isSearchable) {
                $dataTableColumns[] = $fieldTemplate;
            } else {
                if ($this->commandData->isLocalizedTemplates()) {
                    $dataTableColumns[] = $fieldTemplate;
                } else {
                    $dataTableColumns[] = "'".$field->name."' => ['searchable' => false]";
                }
            }
        }

        return $dataTableColumns;
    }

    public function rollback()
    {
        if ($this->rollbackFile($this->path, $this->fileName)) {
            $this->commandData->commandComment('Controller file deleted: '.$this->fileName);
        }

        if ($this->commandData->getAddOn('datatables')) {
            if ($this->rollbackFile(
                $this->commandData->config->pathDataTables,
                $this->commandData->modelName.'DataTable.php'
            )) {
                $this->commandData->commandComment('DataTable file deleted: '.$this->fileName);
            }
        }
    }

    function generateItemRelations($commandDataRelations)
    {
        $relations = ['REPOSITORY_REFERENCE_OPTION_ITEM' => [], 'REPOSITORY_OPTION_ITEM_INSTANCE' => [], 'LIST_OPTION_ITEM_INSTANCE' => []];
        $count = 1;
        $fieldsArr = [];        
        foreach ($commandDataRelations as $relation) {
            $field = (isset($relation->inputs[0])) ? $relation->inputs[0] : null;
                
            $relationShipText = $field;
            if (in_array($field, $fieldsArr)) {
                $relationShipText = $relationShipText.'_'.$count;
                $count++;
            }
            //$REPOSITORY_OPTION_ITEM_INSTANCE
            if($relation->type == 'mt1'){
                $inputs = $relation->inputs;
                $modelName = array_shift($inputs);                                
                
                if (!empty($relationShipText)) {                                        
                    $fieldsArr[] = $field;                                        
                    $instanceModelName = \Str::camel($modelName);
                    $relations['REPOSITORY_REFERENCE_OPTION_ITEM'][] = 'use $NAMESPACE_REPOSITORY$\\'.\Str::singular($modelName).'Repository;';
                    $relations['REPOSITORY_OPTION_ITEM_INSTANCE'][] = '$'.$instanceModelName.' = new '.\Str::singular($modelName).'Repository(app());';
                    $relations['LIST_OPTION_ITEM_INSTANCE'][] = '\''.$instanceModelName.'Items\' => [\'\' => __(\'crud.option.'.$instanceModelName.'_placeholder\')] + $'.$instanceModelName.'->pluck()';
                }
            }
            // set unique
            $relations['REPOSITORY_REFERENCE_OPTION_ITEM'] = array_unique($relations['REPOSITORY_REFERENCE_OPTION_ITEM']);
        }

        return $relations;
    }
}
