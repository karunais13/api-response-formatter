<?php

namespace Karu\ApiResponse\Helpers;

use Exception;

class ApiResponseHelper
{
    /**
     * @param $succeeded
     * @param int $code
     * @param array $objects
     * @return array|null
     */
    public function res($succeeded, $code = 0, $objects = [] ): ?array
    {
        try {

            return [
                'succeeded'	=> $succeeded,
                'code'		=> $code,
                'message'	=> $this->getMessageByCode($code),
                'objects'	=> $objects
            ];

        } catch(Exception $e){

            return [
                'succeeded'	=> false,
                'code'		=> -1,
                'message'	=> $e->getMessage(),
                'objects'	=> []
            ];
        }
    }

    /**
     * @param $succeeded
     * @param string $message
     * @param array $objects
     * @return array
     */
    public function resCustom($succeeded, $message = '', $objects = [] ): array
    {
        return [
            'succeeded'		=> $succeeded,
            'code'			=> 0,
            'message'		=> $message,
            'objects'		=> $objects
        ];
    }

    /**
     * @param $attributes
     * @return string
     */
    public function validatorMessages($attributes ): string
    {
        $cMessage	= '';
        foreach( $attributes as $messages ){
            foreach( $messages as $message ) {
                $cMessage .= $message . '\n';
            }
        }

        return $cMessage;
    }

    /**
     * @param int $code
     * @return array|string|null
     */
    public function getMessageByCode($code = 0 )
    {
        $messages   = config('responsecode.message');

        return $messages[$code] ? __($messages[$code]) : __('');
    }

}
