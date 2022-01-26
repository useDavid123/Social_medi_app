<?php
if(!empty($log ))

{

    $count = 1;
    $outputhead = '';
    $outputbody = '';
    $outputtail ='';

    $outputhead .= '<div class="table-responsive" >
                    <table class="table table-bordered">
                        <thead>

                ';

    foreach ($log as $logs)
    {

        $body = substr(strip_tags($logs->fullname),0,50)."...";
        $show = url('posts/signIn/pairs/'.$logs->id);
        $outputbody .=  '

                            <tr>
		                        <th>'.$count++.'</th>

		                        <th><img src="'.Storage::url($logs->medias->media_path).'" width="60" height="50"</th>


		                        <th>'.$logs->username.'</th>
                                <th>'.$logs->fullname.'</th>
                                <th><a href="'.$show.'"  title="SHOW" ><span class="glyphicon glyphicon-list"></span></a></th>
                            </tr>
                    ';


}
    $outputtail .= '
                        </thead>
                    </table>
                </div>';

    echo $outputhead;
    echo $outputbody;
    echo $outputtail;
}

else
{
    echo 'Data Not Found';
}
?>
