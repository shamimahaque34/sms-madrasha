<?php

function saveImage($image, $directory, $imageNameString = null, $modelFileUrl=null)
{

    if ($image)
    {
        if (isset($modelFileUrl))
        {
            if (file_exists($modelFileUrl))
            {
                unlink($modelFileUrl);
            }
        }
        $imageName = (isset($imageNameString) ? $imageNameString : '').time().rand(10,1000).'.'.$image->getClientOriginalExtension();
        $image->move($directory, $imageName);
        $imgUrl = $directory.$imageName;
    } else {
        $imgUrl = $modelFileUrl;
    }
    return $imgUrl;
}

function saveAudio($audio, $directory, $audioNameString = null, $modelFileUrl=null)
{

    if ($audio)
    {
        if (isset($modelFileUrl))
        {
            if (file_exists($modelFileUrl))
            {
                unlink($modelFileUrl);
            }
        }
        $audioName = (isset($audioNameString) ? $audioNameString : '').time().rand(10,1000).'.'.$audio->getClientOriginalExtension();
        $audio->move($directory, $audioName);
        $audioUrl = $directory.$audioName;
    } else {
        $audioUrl = $modelFileUrl;
    }
    return $audioUrl;
}
