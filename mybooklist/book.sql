-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-11-03 15:10:57
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `book`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kana`
--

CREATE TABLE `kana` (
  `kana_id` int(11) NOT NULL,
  `kana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `kana`
--

INSERT INTO `kana` (`kana_id`, `kana`) VALUES
(1, 'ぼっこちゃん'),
(2, 'あさがくる'),
(3, 'すなのおんな'),
(4, 'ぐらすほっぱー'),
(5, 'すべてがえふになる'),
(6, 'どくしょかんそうぶん'),
(7, 'あのなつがほうわする'),
(8, 'にんげんしっかく'),
(9, 'あかいへや'),
(10, 'おんなきゃく'),
(11, 'ゆめじゅうや');

-- --------------------------------------------------------

--
-- テーブルの構造 `list`
--

CREATE TABLE `list` (
  `list_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `writer` varchar(50) NOT NULL,
  `impression` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `list`
--

INSERT INTO `list` (`list_id`, `title`, `writer`, `impression`) VALUES
(1, 'ぼっこちゃん', '星新一', '短編で読みやすい'),
(2, '朝が来る', '辻村深月', '読んでないけど気になる'),
(3, '砂の女', '安部公房', '不気味で面白い'),
(4, 'グラスホッパー', '伊坂幸太郎', '序盤から衝撃'),
(5, 'すべてがFになる', '森博嗣', 'すべてがFになります。'),
(6, '読書間奏文', 'Saori', '私がエッセイ本や本自体を読むきっかけになった作品。目次が本の作品名になっていて、自分の人生とその作品をリンクさせて書かれた斬新な作品がお気に入りポイントで、自分に影響を与えてくれた作品があるのはかっこいいなと思った。'),
(7, 'あの夏が飽和する', 'カンザキイオリ', '元々『あの夏が飽和する』という楽曲が好きで作品化されたことによって読んだ小説。登場人物がそれぞれ抱えている悩みがどれも人間味があって、とても他人事とは思えない心苦しくなるような作品だった。'),
(8, '人間失格', '太宰治', '太宰の作品の中で一番苦手な作品であり、一番読んだ作品。この作品の主人公である葉蔵の思考と自分がどこか類似している部分が多いような気がして嫌になったが、客観視できたことで改めて自分を見つめなおせたのではとも思う。読んでよかったと思うがそれでも好きではない。'),
(9, '赤い部屋', '江戸川乱歩', '私が江戸川乱歩の作品で1番好きな作品。よくもまあこの内容で出版許可が降りたなと思うほどに、人間の黒い部分がこれでもかというくらいに詰まった作品。理解到底できないが、なるほどなと思わず思ってしまう不思議で斬新な作品。'),
(10, '女客', '泉鏡花', '泉鏡花を好きになったきっかけの作品。比喩表現が多いため理解するのに少し大変だが、文庫本20ページ程度の短編小説なのに映画一本分を見たような満足感のある作品だった。'),
(11, '夢十夜', '夏目漱石', '夏目漱石が見た10の夢が描かれた作品。リアルなものからファンタジーなものまで、どれも不思議なものばかりでとても読みごたえがあった。個人的に『第一夜』と『第三夜』が好き。『第一夜』は、太陽の動き（東から登って西に沈む）で100年という長い月日を表しているところは、とても綺麗だなと思う。『第三夜』は盲目なはずの子供が周囲の状況を淡々と当ててしまうという不気味な雰囲気がすごくおもしろかった。');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kana`
--
ALTER TABLE `kana`
  ADD PRIMARY KEY (`kana_id`);

--
-- テーブルのインデックス `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`list_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `list`
--
ALTER TABLE `list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `kana`
--
ALTER TABLE `kana`
  ADD CONSTRAINT `kana_ibfk_1` FOREIGN KEY (`kana_id`) REFERENCES `list` (`list_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
