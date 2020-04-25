<?
session_start();
include "../lib/dbconn.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
	<link href="../css/board1.css" rel="stylesheet" type="text/css" media="all">
	<meta charset="utf-8">
</head>
<?
if ($mode=="modify" || $mode=="response")
{

	$sql = "select * from $table where num=$num";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);

	$item_subject     = $row[subject];
	$item_content     = $row[content];

	if ($mode=="response")
	{
		$item_subject = "[re]".$item_subject;
		$item_content = ">".$item_content;
		$item_content = str_replace("\n", "\n>", $item_content);
		$item_content = "\n\n".$item_content;
	}
	mysqli_close($conn);
}
?>
<body>

<div id="container">
	<div id="header0">
		<div id="header1">
			<div id="header2">
				<div id="header3_1">
					<? include "../lib/top_login2.php"; ?>
				</div>
				<div id="header3_2">
					<? include "../lib/top_menu2.php"; ?>
				</div>
			</div>
		</div>
	</div>
	<div id="content0">
		<div id="content1">

			<div id="content">
				<div id="col1">
					<div id="left_menu">
						<?
						include "../lib/left_menu.php";
						?>
					</div>
				</div>

				<div id="col2">
					<div id="title">
						<img src="../img/title_qna.gif">
					</div>
					<div class="clear"></div>

					<div id="write_form_title">
						<img src="../img/write_form_title.gif">
					</div>
					<div class="clear"></div>
					<?
					if($mode=="modify")
					{
					?>
					<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>">
						<?
						}
						elseif ($mode=="response")
						{
						?>
						<form  name="board_form" method="post" action="insert.php?mode=response&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>">
							<?
							}
							else
							{
							?>
							<form  name="board_form" method="post" action="insert.php?table=<?=$table?>">
								<?
								}
								?>
								<div id="write_form">
									<div class="write_line"></div>
									<div id="write_row1">
										<div class="col1"> 닉네임 </div>
										<div class="col2"><?=$usernick?></div>
										<?
										if( $userid && ($mode != "modify")  && ($mode != "response") )
										{
											?>
											<div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
											<?
										}
										?>
									</div>
									<div class="write_line"></div>
									<div id="write_row2"><div class="col1"> 제목   </div>
										<div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
									</div>
									<div class="write_line"></div>
									<div id="write_row3"><div class="col1"> 내용   </div>
										<div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
									</div>
									<div class="write_line"></div>
								</div>

								<div id="write_button"><input type="image" src="../img/ok.png">&nbsp;
									<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>
								</div>
							</form>

				</div> <!-- end of col2 -->
			</div> <!-- end of content -->
		</div>
	</div>
	<div id="footer0">
		<div id="footer1">

		</div>
	</div>
</div>







</body>
</html>
