<?php

namespace Karu\ApiResponse\Helpers;

use Exception;

class ApiResponse
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
        $messages   = [
            0           => '',

            // Model    : User
            100         => __('User not found.'),
            101         => __('Incorrect combination of login information.'),
            102         => __('You\'re not allow to use the same current password.'),
            103         => __('Failed to update new password.'),
            104         => __('This email is not available.'),
            105         => __('Failed to create new user account.'),
            106         => __('Failed to upload avatar.'),
            107         => __('Failed to update user account.'),
            108         => __('Invalid image file format.'),
            109         => sprintf(__('Image file size cannot larger than %dMB.'), 5),
            110         => __('Old password incorrect.'),
            111         => __('Email does not exits. Please contact admin to reset the password.'),
            112         => __('Password successfully updated')
        ];

        return $messages[$code] ?? __('');
    }

}
