<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 08.09.16
 * Time: 20:26
 */
namespace Adjutants\Inventory;

abstract class AdjutantsConstants
{
    /*
        * _c - camelCase
        * _s - snake_case
        * _l - lower
        * _n - natural language (more than one word)
        * _i - integer
        * _i_str - integer-string, i.e. '127.0.0.1'
        * _ucf - upper case first letter
        * _dot - dot.case
        *
        * _p - PascalCase
        * _namespace - 'AppBundle\Service\SomeService\Inventory\SomePath'
        *
        *
        * _c_m - camelCase, modified (more than one difference from standard camelCase) like Bundle:EntityName
        *
        * without - UPPER_CASE
        * */

    const ASC = 'ASC';
    const DESC = 'DESC';
    const INFORMATION_WAS_NOT_SAVED_n = "Information was not saved.";
    const STATUS_l = 'status';
    const MESSAGE_l = 'message';
    const SOMETHING_GOES_WRONG_n = 'Something goes wrong';
    const NOT_FOUND_n = 'Not found';
    const BOOL_l = 'bool';
    const STRING_l = 'string';
    const INVENTORY_ucf = 'Inventory';
    const CONSTANTS_ucf = 'Constants';
    const DTO_ucf = 'Dto';
    const TRUE_l = 'true';
    const FALSE_l = 'false';
    const COLLECTION_ucf = 'Collection';
    const NAME_l = 'name';
    const NAME_ucf = 'Name';
    const SET_l = 'set';
    const OPTIONS_ucf = 'Options';
    const PARAMS_l = 'params';
    const SUCH_OBJECT_ALREADY_EXISTS_n = 'Such object already exists.';
    const ERROR_l = 'error';
    const CODE_l = 'code';
    const INVALID_ARGUMENT_WAS_SENT_n = 'Invalid argument was sent.';
    const IS_DELETED_c = 'isDeleted';
    const TEMPLATE_NAME_c = 'templateName';
    const IS_l = 'is';
    const STARTING_POSITION_i = 0;
    const VISIBLE_ucf = 'Visible';
    const DEFAULT_ucf = 'Default';
    const UNKNOWN_OPTIONS_TYPE_n = "Unknown options type.";
    const TEMPLATES_LIST_c = 'templatesList';
    const ACCESSIBLE_TEMPLATES_LIST_c = 'accessibleTemplatesList';
    const TEMPLATES_NAMES_LIST_c = 'templatesNamesList';
    const TEMPLATE_NAME_n = 'Template name';
    const PARAMS_ucf = 'Params';
    const CAN_NOT_BE_EMPTY_n = 'can not be empty.';
    const PROJECT_AUTO_ID_s = 'project_auto_id';
    const PROJECT_ID_c = 'projectId';
    const PROJECT_l = 'project';
    const DUPLICATE_ucf = 'Duplicate';
    const TEMPLATE_ID_c = 'templateId';
    const ID_l = 'id';
    const IS_DEFAULT_p = 'IsDefault';
    const IS_VISIBLE_p = 'IsVisible';

    const LOCALHOST_ADDRESS_i_str = '127.0.0.1';
    const PORT_NUMBER_s = 'port_number';
    const FREE = 'FREE';

    const HOST_l = 'host';
    const STYLE_l = 'style';
    const SSCROLL_l = 'sscroll';
    const MAIL_LISTS_ID_c = 'mailListsId';
    const LIGHT_l = 'light';
    const CHANGE_LOADING_GIF_c = 'changeLoadingGif';

    const FROM_l = 'from';
    const TO_l = 'to';
    const AMOUNT_l = 'amount';
    const EXCHANGE_RATE_c = 'exchangeRate';
    const PARAMETER_ucf = 'Parameter';

}
