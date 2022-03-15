<?php

namespace App\Traits;

Trait SearchTrait
{


    public function my_search($model ,  $myRequest , $title = 'title' , $link=null , $endLink=null)
    {
        if ($myRequest->search != null && $myRequest->search != ""){
            if ($myRequest->ajax()) {

                $data = $model::where($title . '->ar', 'like', '%' . $myRequest->search . '%')
                    ->orWhere($title . '->en', 'like', '%' . $myRequest->search . '%')
                    ->orWhere('created_at', 'like', '%' . $myRequest->search . '%')
                    ->orWhere('updated_at', 'like', '%' . $myRequest->search . '%')
                    ->get();
                $output = '';
                if (count($data) > 0) {

                    $output .=
                        "<table id='table-live-search' class='table-live-search border border-2 table'>" .

                        "<thead class='border border-2 p-5'>" .
                        "<tr>" .
                        "<th scope='col'>#</th>" .
                        "<th scope='col'>Title</th>" .
                        "<th scope='col'>Description</th>" .
                        "</tr>" .
                        "</thead>" .

                        "<tbody class='p-5'>";


                    foreach ($data as $row) {

                        $output .= "<tr class='w-100 p-2'>" .
                            "<th class='p-2' scope='row'>" . $row->id . "</th>" .
                            "<td class='p-2'>" . $link . $row->$title . $endLink . "</td>" .
                            "<td class='p-2'>" . $row->summary . "</td>" .

                            /********************************/
                            "  <td>" .
                            '<button type="button" class="btn btn-info btn-sm" data-toggle="modal"' .
                            ' data-target="#edit' . $row->id . '"' .
                            '   title="edit"><i class="fa fa-edit"></i></button>' .
                            '  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"' .
                            '   data-target="#delete' . $row->id . '"' .
                            '  title="delete"><i' .
                            ' class="fa fa-trash"></i></button>' .
                            ' </td>' .


                            /*****************************/
                            "</tr>";
                    }


                    $output .= "</tbody></table>";


                } else {
                    $output .= 'No Results';
                }

                echo $output;

            }//request ajax
        }
    }
}
