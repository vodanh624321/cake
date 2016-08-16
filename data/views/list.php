<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
  <!-- DANH SACH PHIM ĐANG CHIẾU
   <table class="table table-bordered" border="1">
  
  
   <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Genre</th>
        <th>Actor</th>
        <th>Image</th>
        <th>Year</th>
        <th>Start_date</th>
        <th>End_date</th>
        
        
    </tr>
    
   
   <?php   foreach ($phimdc as $key => $movie_id ) {?>
      <tr>
            <td>
                <?php echo $movie_id['id'] ?>
            </td>
            <td>
                <?php echo $movie_id ['name'] ?>
            </td>
            <td>
                <?php echo $movie_id ['description'] ?>
            </td>
            <td>
                <?php echo ($movie_id['genre'] ) ?>
            </td>
            <td>
                <?php echo  $movie_id ['actor'] ?>
            </td>
            <td>        
              <img src="<?php echo UPLOAD_DIR ?><?php echo $movie_id ['image'] ?>" 
              style="max-width: 200px"
              />
             
             
            </td>
            <td>
                <?php echo $movie_id ['year'] ?>
            </td>
            <td>
                <?php echo $movie_id ['start_date'] ?>
            </td>
            <td>
                <?php echo $movie_id['end_date'] ?>
            </td>         
        </tr>
        <?php } ?>
   
      
   
  </table>
	
	DANH SACH PHIM SẮP CHIẾU 
    <table class="table table-bordered" border="1">
    
    <tr>
       <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Genre</th>
        <th>Actor</th>
        <th>Image</th>
        <th>Year</th>
        <th>Start_date</th>
        <th>End_date</th>
    </tr>
      <?php   foreach($phimsc as $key=>$movie_id ){?>
        <tr>
            <td>
             <?php  echo $movie_id ['id']?>
             </td>
            <td>
            <?php echo $movie_id ['name']?>
            </td>     
            <td>
            <?php echo $movie_id ['description']?>
              </td> 
               <td>
            <?php echo $movie_id ['genre']?>
              </td> 
              <td>
              <?php echo $movie_id['actor']?>
              </td>  
              <td>
            	<img src="<?php echo UPLOAD_DIR ?><?php echo $movie_id['image']?>" width="200px"/>
              </td> 
              <td>
              <?php echo $movie_id['year']?>
              </td> 
             <td>
              <?php echo $movie_id['start_date']?>
              </td> 
              <td>
              <?php echo $movie_id['end_date']?>
              </td> 
            </td>
            
            
        </tr>
      <?php } ?>
    </table>-->
    
    DANH SACH PHIM DANG VA SAP CHIEU
    <div>
    <form method="get" action="?" name="form">
	<div> Name   <input type="text" name="name"/>
    </div>
    <div> Genre
    <input type="text" name="genre"/>
    </div>
    <div> Date
    <input type="text" name="date"/>
    </div>
    <button >Search</button>
    </form>
    </div>
    
     <table class="table table-bordered" border="1">
<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Genre</th>
        <th>Performance</th>
        <th>Actor</th>
        <th>Image</th>
        <th>Year</th>
        <th>Start_date</th>
        <th>End_date</th>

</tr>
        <?php   foreach ($phims as $key=>$movie_id){ ?>
        <tr>
           <td>  <?php echo $movie_id['id']?></td>
           <td> <?php echo $movie_id['name']?></td>
            <td>
            <?php echo $movie_id ['description']?>
              </td> 
               <td>
            <?php echo $movie_id ['genre']?>
              </td> 
              <td>
              <?php 

			  foreach($arrTmp = $suatchieuphim[$movie_id['id']] as $value) {
				  echo '<button>'.$value.'</button>';
			  }
			  			//  echo $arrTmp[6];
			  ?>
              
              </td> 
              <td>
              <?php echo $movie_id['actor']?>
              </td>  
              <td>
            <img src="<?php echo UPLOAD_DIR ?><?php echo $movie_id['image']?>" width="200px"/>
              </td> 
              <td>
              <?php echo $movie_id['year']?>
              </td> 
             <td>
              <?php echo $movie_id['start_date']?>
              </td> 
              <td>
              <?php echo $movie_id['end_date']?>
              </td> 
            </td>
           </tr>
        <?php }?>
        
       
	   
</table>
PHIM CÓ ID =1

</body>
</html>