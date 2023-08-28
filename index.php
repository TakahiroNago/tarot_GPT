<?php
require_once('php/draw.php');

if(isset($_POST['user_input'])){
	$user_input = $_POST['user_input'];
}else{
	$user_input = '';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tarot GPT</title>
	<meta name="description" content="Chat GPTを利用したタロットリーディング。集合知を利用したリーディングで、あなたの誰にも言えないお悩みを解消しよう。">
	
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- reset CSS -->
	<link rel="stylesheet" href="https://unpkg.com/ress@4.0.0/dist/ress.min.css">
	<!-- stylesheet -->
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<header class="header">
		<div class="container">
			<h1>Tarot GPT</h1>
			<p>集合知を利用したリーディングで、あなたの誰にも言えないお悩みを解消しよう。</p>
		</div>
	</header>
	<main>
		<div class="question">
			<div class="container">
				<form action="result.php" method="POST">
					<div class="question-text">
						<p>心を静めて、あなたの聞きたいことを思い浮かべてください。<br class="pc-br">イエス・ノーがはっきりするくらい質問が明確になったら、質問を入力してください。<br><span>（答えの生成に少し時間がかかります。）</span></p>
					</div>
					<div>
						<input type="text" name="user_input" placeholder="質問を入力してください" value="<?=$user_input?>">
					</div>
					<button type="submit">
						<img src="img/card_b.png" alt="">
						<span>占う</span>
					</button>
				</form>
				
			</div>
		</div>
	</main>

	<footer class="footer">
		<div class="container">
			<p>
				<span>Tarot GPT からのお知らせ:</span><br>タロットリーディングを行いますが、覚えておいていただきたいことがあります。タロットは未来を正確に予知するものではなく、あくまでガイダンスやインスピレーションを提供するツールです。また、リーディング結果はあくまで一つの可能性であり、実際の状況は常に変化することを覚えておいてください。
			</p>
		</div>
	</footer>

</body>
</html>