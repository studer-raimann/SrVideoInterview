<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit357b332b054365bb3c0e8d6632cb069c
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'srag\\Plugins\\SrVideoInterview\\' => 30,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'srag\\Plugins\\SrVideoInterview\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'ILIAS\\UI\\Implementation\\Component\\Input\\Field\\MultiSelectUserInput' => __DIR__ . '/../..' . '/classes/UIComponent/MultiSelectUserInput.php',
        'ILIAS\\UI\\Implementation\\Component\\Input\\Field\\SrVideoInterviewRenderer' => __DIR__ . '/../..' . '/classes/UIComponent/SrVideoInterviewRenderer.php',
        'ILIAS\\UI\\Implementation\\Component\\Input\\Field\\VideoRecorderInput' => __DIR__ . '/../..' . '/classes/UIComponent/VideoRecorderInput.php',
        'ilObjSrVideoInterview' => __DIR__ . '/../..' . '/classes/class.ilObjSrVideoInterview.php',
        'ilObjSrVideoInterviewAccess' => __DIR__ . '/../..' . '/classes/class.ilObjSrVideoInterviewAccess.php',
        'ilObjSrVideoInterviewAnswerGUI' => __DIR__ . '/../..' . '/classes/SrVideoInterviewGUI/class.ilObjSrVideoInterviewAnswerGUI.php',
        'ilObjSrVideoInterviewExerciseGUI' => __DIR__ . '/../..' . '/classes/SrVideoInterviewGUI/class.ilObjSrVideoInterviewExerciseGUI.php',
        'ilObjSrVideoInterviewGUI' => __DIR__ . '/../..' . '/classes/class.ilObjSrVideoInterviewGUI.php',
        'ilObjSrVideoInterviewListGUI' => __DIR__ . '/../..' . '/classes/class.ilObjSrVideoInterviewListGUI.php',
        'ilObjSrVideoInterviewParticipantGUI' => __DIR__ . '/../..' . '/classes/SrVideoInterviewGUI/class.ilObjSrVideoInterviewParticipantGUI.php',
        'ilObjSrVideoInterviewParticipantTableGUI' => __DIR__ . '/../..' . '/classes/SrVideoInterviewGUI/class.ilObjSrVideoInterviewParticipantTableGUI.php',
        'ilObjSrVideoInterviewUploadHandlerGUI' => __DIR__ . '/../..' . '/classes/SrVideoInterviewGUI/class.ilObjSrVideoInterviewUploadHandlerGUI.php',
        'ilSrVideoInterviewPlugin' => __DIR__ . '/../..' . '/classes/class.ilSrVideoInterviewPlugin.php',
        'srag\\Plugins\\SrVideoInterview\\AREntity\\ARAnswer' => __DIR__ . '/../..' . '/classes/AREntity/ARAnswer.php',
        'srag\\Plugins\\SrVideoInterview\\AREntity\\ARExercise' => __DIR__ . '/../..' . '/classes/AREntity/ARExercise.php',
        'srag\\Plugins\\SrVideoInterview\\AREntity\\ARParticipant' => __DIR__ . '/../..' . '/classes/AREntity/ARParticipant.php',
        'srag\\Plugins\\SrVideoInterview\\Repository\\AnswerRepository' => __DIR__ . '/../..' . '/classes/Repository/AnswerRepository.php',
        'srag\\Plugins\\SrVideoInterview\\Repository\\ExerciseRepository' => __DIR__ . '/../..' . '/classes/Repository/ExerciseRepository.php',
        'srag\\Plugins\\SrVideoInterview\\Repository\\ParticipantRepository' => __DIR__ . '/../..' . '/classes/Repository/ParticipantRepository.php',
        'srag\\Plugins\\SrVideoInterview\\Repository\\VideoInterviewRepository' => __DIR__ . '/../..' . '/classes/Repository/VideoInterviewRepository.php',
        'srag\\Plugins\\SrVideoInterview\\UIComponent\\Loader' => __DIR__ . '/../..' . '/classes/UIComponent/Loader.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit357b332b054365bb3c0e8d6632cb069c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit357b332b054365bb3c0e8d6632cb069c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit357b332b054365bb3c0e8d6632cb069c::$classMap;

        }, null, ClassLoader::class);
    }
}
