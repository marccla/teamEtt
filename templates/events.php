<? require('get-events.php');?>


<?
//Looping each row in table as its own "article"
 foreach ($events as $event){ ?>
    <? echo $event['title']?>
    <? echo $event['text']?>
    <? echo $event['img_url']?>
 <? }
