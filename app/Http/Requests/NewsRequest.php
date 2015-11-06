<?php

namespace App\Http\Requests;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class NewsRequest extends Request {

    public function rules() {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'title' => 'required|unique|max:150',
                        'content' => 'required',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'title' => 'required|unique|max:150',
                        'content' => 'required',
                    ];
                }
            default:break;
        }
    }

}

?>
