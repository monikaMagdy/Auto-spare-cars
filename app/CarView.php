	<select name="Role">
		<button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
		  Please enter your role
		
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		 <option> <a class="dropdown-item" href="#" name="Manager">Manager  </a></option>
		  <div class="dropdown-divider"></div>
		  <option><a class="dropdown-item" href="#" name="Employee">Employee </a></option>
		  </select>
		  </button>

		  
		</div>
	  </div><?php

//define('__ROOT__', "../lib/");
require_once(__ROOT__ . "view/View.php");


class ViewCar extends View
{	
	public function output()
	{
		$str = "";
		$str.="<table>";
		$str.="<tr>
				<th>image</th>
				<th>Name</th>
				<th>modek</th>
				<th>Year</th>
				<th>Action</th>
			  </tr>";
		foreach($this->model->getCars() as $Car){
			$str.="<tr>";
			$str.="<td><img "echo 'src=img/portfolio/'.$Car->getimgName() ."></td> ";
			$str.="<div class='portfolio-caption'>
						<td>  Peress to check ".$Car->getCarName() ." parts 
						</td>
					<div> ";
			$str.="<td>" .$Car->getCarModel() ."</td> ";
			$str.="<td>" .$Car->getCarYear() ."</td> ";
			$str.="<td>
			<a href='Car.php?action=add'>Add</a>
			<a href='Car.php?action=edit&id=".$Car->getCarID()."'>Edit</a>
			<a href='Car.php?action=delete&id=".$Car->getCarID()."'>Delete</a>
			</td>";

			$str.="</tr>";
		}
		
		return $str;
	}
	
	

	function addCar()
	{
		$str='<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Registration Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	body{
		color: #fff;
		background: #000000;
		
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #e9d900;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #e9d900;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #e9d900;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #000000;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	} 
</style>
</head>
<body>
<div class="signup-form">

<form action="Car.php?action=addAction" method="post">

	<h2>Add Car</h2>
		<p class="hint-text">Car Infromation</p>

		<div class="form-group">
		<div><input type="text" class="form-control" name="CarName" id="CarName" placeholder="Enter Car Name"/>
		</div>
		</div>
		<br>
		<div class="form-group">
			<div><input type="text" class="form-control" name="CarModel" id="CarModel" placeholder="Enter Car Model"/>
			</div>
			</div>
		<br>
		<div class="form-group">
			<div><input type="text" class="form-control" name="CarYear" id="CarYear" placeholder="Enter Year"/>
			</div>
			</div>
		<br>
		<div class="form-group">
			<div>
				<input type="text" class="form-control" name="imgName"  id="imgName" placeholder="Imge Name"/>
			</div>
		</div>
		<br>
		<div class="form-group">
			<div class="form-group">
				<button type="submit" class="btn btn-warning" name="Add" id="Add">Add</button>
        	</div>
        </div>
		</form>';
		return $str;
	}

	public function viewEditCar($id)
	{
		$str = "";
		$str.="<table>";
		$str.="<tr><th>Name</th><th>Model</th><th>Year</th><th>Action</th></tr>";
		foreach($this->model->getCars() as $Car){
			if($Car->getCarID()===$id) 	{
				$str.="<tr>";
				$str.="<form 
				action='Car.php?action=editAction&id=".$Car->getCarID()."' method='post'>";
				$str.="<td><input type='text' name='CarName' value='".$Car->getCarName() ."'>  </td> ";
				$str.="<td><input type='text' name='CarModel' value='".$Car->getCarModel() ."'></td> ";
				$str.="<td><input type='text' name='CarYear' value='".$Car->getCarYear() ."'>
				</td> ";
				$str.="<td><input type='submit' value='Change'/></td>";
				$str.="</form>";
				$str.="</tr>";
			}
		}
	
		$str.="<a href='Car.php'>Back to Movies </a>";
		return $str;
	}

}
?>
	<select name="Role">
		<button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
		  Please enter your role
		
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		 <option> <a class="dropdown-item" href="#" name="Manager">Manager  </a></option>
		  <div class="dropdown-divider"></div>
		  <option><a class="dropdown-item" href="#" name="Employee">Employee </a></option>
		  </select>
		  </button>

		  
		</div>
	  </div>