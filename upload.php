<?php
// アップロードされたファイルがあるかどうかを確認
if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
    $upload_dir = "uploads/"; // 画像を保存するディレクトリ

    // ファイルの拡張子を取得
    $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

    // ランダムな文字列を生成
    $random_string = generateRandomString();

    // 画像を移動して保存
    $file_path = $upload_dir . $random_string . "." . $extension;
    move_uploaded_file($_FILES["image"]["tmp_name"], $file_path);

    echo "画像がアップロードされました。<br>";
    echo "保存されたファイル名: " . $random_string . "." . $extension;
} else {
    echo "画像のアップロード中にエラーが発生しました。";
}

// ランダムな文字列を生成する関数
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
