<?php

namespace Karu\ApiResponse\Helpers;

use Exception;

class ApiResponseHelper
{
    public function res( $succeeded, $code = 0, $objects = [] ): ?array
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

    public function resCustom( $succeeded, $message = '', $objects = [] ): array
    {
        return [
            'succeeded'		=> $succeeded,
            'code'			=> 0,
            'message'		=> $message,
            'objects'		=> $objects
        ];
    }

    public function validatorMessages( $attributes ): string
    {
        $cMessage	= '';
        foreach( $attributes as $messages ){
            foreach( $messages as $message ) {
                $cMessage .= $message . '\n';
            }
        }

        return $cMessage;
    }

    public function getMessageByCode( $code = 0 )
    {
        $messages   = config('apiResponse.message');

        return $messages[$code] ?? __('');
    }

}
