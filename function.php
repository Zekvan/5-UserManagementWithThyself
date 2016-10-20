<?php 	


function isUploadAnImage($uploadFile,$approveMimeType = ["image/png","image/jpeg","image/jpg"]) {
	if (!$size = getimagesize($uploadFile['tmp_name'])) return false;
	if (! in_array($size['mime'],$approveMimeType)) return false;
	return true;
}
