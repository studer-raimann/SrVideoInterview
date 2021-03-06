<?php

namespace srag\Plugins\SrVideoInterview\Repository;

use srag\Plugins\SrVideoInterview\VideoInterview\Repository;
use srag\Plugins\SrVideoInterview\AREntity\ARAnswer;
use srag\Plugins\SrVideoInterview\VideoInterview\Entity\Answer;
use DemeterChain\A;

/**
 * Class AnswerRepository
 *
 * @author Thibeau Fuhrer <thf@studer-raimann.ch>
 */
class AnswerRepository implements Repository
{
    public function delete(int $answer_id) : bool
    {
        $ar_answer = ARAnswer::find($answer_id);
        if (null !== $ar_answer) {
            $ar_answer->delete();
            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function store(object $answer) : bool
    {
        if (!$answer instanceof Answer) return false;
        $ar_answer = ARAnswer::find($answer->getId());
        if (null === $ar_answer) {
            $ar_answer = new ARAnswer();
            $ar_answer->setId($answer->getId());
        }

        $ar_answer
            ->setType($answer->getType())
            ->setContent($answer->getContent())
            ->setResourceId($answer->getResourceId())
            ->setThumbnailId($answer->getThumbnailId())
            ->setExerciseId($answer->getExerciseId())
            ->setParticipantId($answer->getParticipantId())
            ->store()
        ;

        return true;
    }

    /**
     * @return Answer
     */
    public function get(int $answer_id) : ?object
    {
        $ar_answer = ARAnswer::find($answer_id);
        if (null !== $ar_answer) {
            return new Answer(
                $ar_answer->getId(),
                $ar_answer->getType(),
                $ar_answer->getContent(),
                $ar_answer->getResourceId(),
                $ar_answer->getThumbnailId(),
                $ar_answer->getExerciseId(),
                $ar_answer->getParticipantId()
            );
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public function getAll() : ?array
    {
        $ar_answers = ARAnswer::get();
        $answers = [];

        if (!empty($ar_answers)) {
            foreach ($ar_answers as $ar_answer) {
                $answers[] = new Answer(
                    $ar_answer->getId(),
                    $ar_answer->getType(),
                    $ar_answer->getContent(),
                    $ar_answer->getResourceId(),
                    $ar_answer->getThumbnailId(),
                    $ar_answer->getExerciseId(),
                    $ar_answer->getParticipantId()
                );
            }

            return $answers;
        }

        return null;
    }

    /**
     * check if a Participant has already answered an Exercise by their id's.
     *
     * @param int $participant_id
     * @param int $exercise_id
     * @return bool
     */
    public function hasParticipantAnsweredExercise(int $participant_id, int $exercise_id) : bool
    {
        $ar_answer = ARAnswer::where(array(
            'participant_id' => $participant_id,
            'exercise_id'    => $exercise_id,
            'type'           => ARAnswer::TYPE_ANSWER,
        ),'=')->first();

        return (null !== $ar_answer);
    }

    /**
     * retrieve an existing answer of a participant for an exercise.
     *
     * @param int $participant_id
     * @param int $exercise_id
     * @return Answer|null
     */
    public function getParticipantAnswerForExercise(int $participant_id, int $exercise_id) : ?Answer
    {
        $ar_answer = ARAnswer::where(array(
            'participant_id' => $participant_id,
            'exercise_id'    => $exercise_id,
            'type'           => ARAnswer::TYPE_ANSWER,
        ),'=')->first();

        if (null !== $ar_answer) {
            return new Answer(
                $ar_answer->getId(),
                $ar_answer->getType(),
                $ar_answer->getContent(),
                $ar_answer->getResourceId(),
                $ar_answer->getThumbnailId(),
                $ar_answer->getExerciseId(),
                $ar_answer->getParticipantId()
            );
        }

        return null;
    }

    /**
     * retrieve an existing answer of a Participant for an Exercise with type FEEDBACK.
     *
     * @param int $participant_id
     * @param int $exercise_id
     * @return Answer|null
     */
    public function getParticipantFeedbackForExercise(int $participant_id, int $exercise_id) : ?Answer
    {
        $ar_answer = ARAnswer::where(array(
            'participant_id' => $participant_id,
            'exercise_id'    => $exercise_id,
            'type'           => ARAnswer::TYPE_FEEDBACK,
        ),'=')->first();

        if (null !== $ar_answer) {
            return new Answer(
                $ar_answer->getId(),
                $ar_answer->getType(),
                $ar_answer->getContent(),
                $ar_answer->getResourceId(),
                $ar_answer->getThumbnailId(),
                $ar_answer->getExerciseId(),
                $ar_answer->getParticipantId()
            );
        }

        return null;
    }

    /**
     * deletes all existing answers for a given user participant id.
     *
     * @param int $participant_id
     * @return bool
     */
    public function deleteAnswersForParticipant(int $participant_id) : bool
    {
        $ar_answers = ARAnswer::where(array(
            'participant_id' => $participant_id,
        ), '=')->get();

        if (null !== $ar_answers) {
            foreach ($ar_answers as $ar_answer) {
                $ar_answer->delete();
            }
        }

        // return always true, because answers are optional.
        return true;
    }
}
