<?php
	function isConnected()
	{
		if(!isset($_SESSION['actifUser']))
		{
			header('Location:pages/home.php');
		}
	}

	function isConnected_home()
	{
		if(isset($_SESSION['actifUser']))
		{
			header('Location:../index.php');
		}
	}

	function query($request)
	{
		return mysqli_query(db_connect(),$request);
	}

	function getDataArray($request)
	{
		$query=query($request);
		$result=null;
		$ind=0;
		while($temp=mysqli_fetch_assoc($query))
		{
			if($temp!=null)
			{
				$result[$ind]=$temp;
				$ind++;
			}
		}
		return $result;
	}

	function logIn($email, $password)
	{
		$request='SELECT * FROM Users WHERE Email="%s" AND Password=SHA1("%s")';
		$result=getDataArray(sprintf($request,$email,$password));
		if($result==NULL)
		{
			// $url=$_SERVER['HTTP_REFERER'];
			// header("Location:".$url."?logInFailed");
			header("Location:home.php?logInFailed");
		}
		else
		{
			$_SESSION['actifUser']=$result[0];
			header('Location:../index.php');
		}
	}

	function signIn($user)
	{
		$_SESSION['feedBack']=$user;
		if($user['password']!=$user['passwordConfirm'])
		{
			// $url=$_SERVER['HTTP_REFERER'];
			// header("Location:".$url."?password_no_match");
			header("Location:home.php?password_no_match");
		}
		else
		{
			if(strlen($user['password'])<8)
			{
				// $url=$_SERVER['HTTP_REFERER'];
				// header("Location:".$url."?password_length");
				header("Location:home.php?password_length");
			}
			else
			{
				$request='SELECT * FROM Users WHERE Email="%s"';
				$query=mysqli_query(db_connect(),sprintf($request,$user['email']));
				$result=mysqli_fetch_assoc($query);
				if($result!=NULL)
				{
					// $url=$_SERVER['HTTP_REFERER'];
					// header("Location:".$url."?email_used");
					header("Location:home.php?email_used");
				}
				else
				{
					$request='SELECT * FROM Users WHERE Prenom="%s" AND Nom="%s"';
					$query=mysqli_query(db_connect(),sprintf($request,$user['prenom'],$user['nom']));
					$result=mysqli_fetch_assoc($query);
					if($result!=NULL)
					{
						// $url=$_SERVER['HTTP_REFERER'];
						// header("Location:".$url."?username_used");
						header("Location:home.php?username_used");
					}
					else
					{
						unset($_SESSION['feedBack']);
						$request='INSERT INTO Users VALUES (null,"%s","%s","%s",SHA1("%s"))';
						query(sprintf($request,$user['prenom'],$user['nom'],$user['email'],$user['password']));
						logIn($user['email'],$user['password']);
					}
				}
			}
		}
	}

	function getCtgrList()
	{
		$ctgr=array();
		$ctgr[0]="Romance";
		$ctgr[1]="Humour";
		$ctgr[2]="Histoire";
		$ctgr[3]="Fantastique";
		$ctgr[4]="Drame";
		
		return $ctgr;
	}

	function getBook()
	{
		$request='SELECT * FROM Book';
		return getDataArray($request);
	}

	function getBookWritenBy($autor)
	{
		$request='SELECT * FROM Book WHERE Autor="%s"';
		return getDataArray(sprintf($request,$autor));
	}

	function getBookById($id)
	{
		$request='SELECT * FROM Book WHERE BookId=%d';
		return getDataArray(sprintf($request,$id))[0];
	}

	function getBookId($title, $autor)
	{
		$request='SELECT BookId FROM Book WHERE BookTitle="%s" AND Autor="%s"';
		return getDataArray(sprintf($request,$title,$autor))[0]['BookId'];
	}

	function searchBook($keyWord)
	{
		$request='SELECT * FROM Book WHERE BookTitle LIKE "%s%s%s" OR Autor LIKE "%s%s%s" OR RESUME LIKE "%s%s%s" OR Categorie LIKE "%s%s%s"';
		return getDataArray(sprintf($request,'%',$keyWord,'%','%',$keyWord,'%','%',$keyWord,'%','%',$keyWord,'%'));
	}

	function bookExistsById($BookId)
	{
		if(getBookById($BookId)==NULL)
		{
			header('Location:../index.php');
		}
	}

	function areTheSameBook($FirstBook, $SecondBook)
	{
		if($FirstBook['BookTitle']==$SecondBook['BookTitle'] && $FirstBook['Autor']==$FirstBook['Autor'] && $FirstBook['Resume']==$SecondBook['Resume'] && $FirstBook['Categorie']==$SecondBook['Categorie'])
		{
			return true;
		}
		return false;
	}

	function bookExists($book)
	{
		$Books=getBook();
		$hasFound=false;
		for($i=0;$i<count($Books);$i++)
		{
			if(areTheSameBook($Books[$i],$book))
			{
				$hasFound=true;
				break;
			}
		}
		if($hasFound)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function isABook($book)
	{
		if($book['BookTitle']=="" || $book['Autor']=="" || $book['Resume']=="" || $book['Categorie']=='Catégories')
		{
			return false;
		}
		return true;
	}

	function getValue()
	{
		$value=null;
		for($a='a';;$a++)
		{
			$value[]=$a;
			if($a=='y')
			{
				$a++;
				$value[]=$a;
				break;
			}
		}
		for($i=0;$i<=9;$i++)
		{
			$value[]=$i;
		}
		return $value;
	}

	function newReference()
	{
		$value=getValue();
		$book=getBook();
		$result="";
		while(1<2)
		{
			for($i=0;$i<100;$i++)
			{
				$result.=$value[rand(0,35)];
			}
			$alreadyUsed=false;
			for($i=0;$i<count($book);$i++)
			{
				if($book[$i]['Reference']==$result)
				{
					$alreadyUsed=true;
					break;
				}
			}
			if(!$alreadyUsed)
			{
				break;
			}
		}
		return $result;
	}

	function fileOk($file,$reference)
	{
		$done=false;
		$extensions=array('.pdf');
		$fileExtension=strrchr($file['name'], '.');
		if(in_array($fileExtension,$extensions))
		{
			$fileSize=filesize($file['tmp_name']);
			if($fileSize<=2500000)
			{
				$folder='../ressources/';
				if(move_uploaded_file($file['tmp_name'],$folder.$reference.".pdf"))
				{
					$done=true;
				}
			}
		}
		if($done)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function add($book)
	{
		$reference=newReference();
		if(isABook($book) && !bookExists($book) && fileOk($book['file'],$reference))
		{
			$request='INSERT INTO Book VALUES (null,"%s","%s","%s","%s",null,"%s")';
			query(sprintf($request,$book['BookTitle'],$book['Autor'],$book['Resume'],$book['Categorie'],$reference));
			echo "string";
			header('Location:details.php?allow=true&see='.getBookId($book['BookTitle'],$book['Autor']));
		}
		else
		{
			header('Location:ajout.php');
		}
	}

	function delete($BookId)
	{
		$request='DELETE FROM Book WHERE BookId=%d';
		query(sprintf($request,$BookId));
		header('Location:../index.php');
	}

	function edit($BookChanged)
	{
		if(!bookExists($BookChanged))
		{
			$request='UPDATE Book SET BookTitle="%s", Autor="%s", Resume="%s", Categorie="%s" WHERE BookId=%d';
			query(sprintf($request,$BookChanged['BookTitle'],$BookChanged['Autor'],$BookChanged['Resume'],$BookChanged['Categorie'],$BookChanged['BookId']));
		}
		header('Location:details.php?allow=true&see='.$BookChanged['BookId']);
	}

	function isFavorite($BookId,$UserId)
	{
		$request='SELECT * FROM Favoris WHERE BookId=%d AND UserId=%d';
		$result=getDataArray(sprintf($request,$BookId,$UserId))[0];
		if($result==null)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	function switchThis($BookId, $UserId)
	{
		$request="";
		if(isFavorite($BookId,$UserId))
		{
			$request='DELETE FROM Favoris WHERE BookId=%d AND UserId=%d';
		}
		else
		{
			$request='INSERT INTO Favoris VALUES (%d,%d)';
		}
		query(sprintf($request,$BookId,$UserId));
		header('Location:details.php?allow=true&see='.$BookId);
	}

	function getFavoriteBook($user)
	{
		$book=getBook();
		$nbFav=0;
		$temp=array();
		for($i=0;$i<count($book);$i++)
		{
			if(isFavorite($book[$i]['BookId'],$user['UserId']))
			{
				$temp[$nbFav]=$book[$i];
				$nbFav++;
			}
		}
		$result=array();
		for($i=0;$i<$nbFav;$i++)
		{
			$result[$i]=$temp[$i];
		}
		return $result;
	}
?>