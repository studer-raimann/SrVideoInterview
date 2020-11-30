<?php

require_once "./Customizing/global/plugins/Services/Repository/RepositoryObject/SrVideoInterview/classes/class.ilObjSrVideoInterviewGUI.php";

use srag\Plugins\SrVideoInterview\Repository\AnswerRepository;

/**
 * Class ilObjSrVideoInterviewAnswerGUI
 *
 * @author Thibeau Fuhrer <thf@studer-raimann.ch>
 *
 * @ilCtrl_isCalledBy ilObjVideoInterviewAnswerGUI: ilObjSrVideoInterviewGUI
 */
class ilObjSrVideoInterviewAnswerGUI extends ilObjSrVideoInterviewGUI
{
    /**
     * Answer GUI commands
     */
    const CMD_ANSWER_SHOW     = 'showAnswer';
    const CMD_ANSWER_ADD      = 'addAnswer';
    const CMD_ANSWER_DELETE   = 'deleteAnswer';
    const CMD_ANSWER_EVALUATE = 'evaluateAnswer';

    /**
     * @var AnswerRepository
     */
    protected $repository;

    /**
     * Initialise ilObjVideoInterviewAnswerGUI
     *
     * @param int $a_ref_id
     * @param int $a_id_type
     * @param int $a_parent_node_id
     */
    public function __construct($a_ref_id = 0, $a_id_type = self::REPOSITORY_NODE_ID, $a_parent_node_id = 0)
    {
        $this->repository = new AnswerRepository();

        parent::__construct($a_ref_id, $a_id_type, $a_parent_node_id);
    }

    /**
     * dispatches the given command and calls the corresponding method.
     */
    public function executeCommand() : void
    {
        $cmd = $this->ctrl->getCmd(self::CMD_ANSWER_SHOW);

        switch ($cmd)
        {
            case self::CMD_ANSWER_SHOW:
            case self::CMD_ANSWER_ADD:
                if ($this->access->checkAccess("read", $cmd, $this->ref_id)) {
                    $this->$cmd();
                }
                break;
            case self::CMD_ANSWER_DELETE:
            case self::CMD_ANSWER_EVALUATE:
                if ($this->access->checkAccess("write", $cmd, $this->ref_id)) {
                    $this->$cmd();
                }
                break;
            default:
                $this->permissionDenied();
                break;
        }
    }

    protected function showAnswer() : void
    {

    }

    protected function addAnswer() : void
    {

    }

    protected function deleteAnswer() : void
    {

    }

    protected function evaluateAnswer() : void
    {

    }
}