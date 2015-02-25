<?php
for($i=0;$i<sizeof($_FILES['imageLoader']['name']);$i++)
{
    move_uploaded_file($_FILES['imageLoader']['tmp_name'][$i],'files/'.uniqid()."_".$_FILES['imageLoader']['name'][$i]);
    $image="";
    $image+=",".$_FILES['imageLoader']['name'][$i];
}