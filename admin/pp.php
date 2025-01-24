<?php
$('.tr').each(function(index,element){
    const child = $(element).children('input');
    const ddDépart = child.val();
    const NowDates = ddDépart;
    console.log(child.val())
    if(ddDépart == NowDates){
      console.log('alter an');
    $('.btn1').each(function(index,element){
     const id = $(element).text();
     console.log(id)
/*               $.ajax({
        url:'db/alter.php',
        type:'POST',
        data:{id: id,},
        success:function(){}
         })  */
    })
 }else{
  console.log('mbl tsy lera an')
 }
})
?>
