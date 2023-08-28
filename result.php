<?php
require_once('php/draw.php');

if(isset($_POST['user_input'])){
	if(!empty($_POST['user_input'])){
		$user_input = $_POST['user_input'];
	}else{
		header("location: index.php");
		exit;
	}
}else{
	header("location: index.php");
	exit;
}

// OpenAI API
$apiKey = '';
$url = 'https://api.openai.com/v1/chat/completions';

$data = array(
	'model' => 'gpt-3.5-turbo',
	'messages' => [
		["role" => "system", "content" => ""],
		['role' => 'user', 'content' => "以下の質問に対して、タロットで{$card}が出ました。タロットリーディングをお願いします。「'{$user_input}'」"],
	],
	'max_tokens' => 1000, 
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey,
));

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$answer = $result['choices'][0]['message']['content'];
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
		<div class="answer">
			<div class="container">
				<p class="answer-input"><span>Q:</span> <?=$user_input?></p>
				<div class="answer-result">
					<img src="img/<?=$card?>.png" alt="">
					<div class="answer-result-text">
						<p class="answer-result-text-answer"><?=$answer?></p>
					</div>
				</div>
				<form action="index.php" method="POST">
					<button type="submit">もう一度占う</button>
					<input type="hidden" name="user_input" value="<?=$user_input?>">
				</form>
			</div>
		</div>
	</main>
</body>

</html>