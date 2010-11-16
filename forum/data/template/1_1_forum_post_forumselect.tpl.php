<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('post_forumselect');
0
|| checktplrefresh('./template/default/forum/post_forumselect.htm', './template/default/common/simplesearchform.htm', 1287939466, '1', './data/template/1_1_forum_post_forumselect.tpl.php', './template/default', 'forum/post_forumselect')
;?><? include template('common/header'); if(empty($_G['gp_infloat'])) { ?>
<div id="pt" class="bm cl"><? if($_G['setting']['search']) { ?><?php $slist = array(); if($_G['fid'] && $_G['forum']['status'] != 3 && $mod != 'group') { ?><?
$slist[forumfid] = <<<EOF
<li><input type="radio" id="mod_curform" class="pr" name="mod" value="curforum" checked="checked" /><label for="mod_curform" title="搜索本版">搜索本版</label></li>
EOF;
?><? } if($_G['setting']['search']['portal']['status'] && ($_G['group']['allowsearch'] & 1 || $_G['adminid'] == 1)) { ?><?
$slist[portal] = <<<EOF
<li><input type="radio" id="mod_article" class="pr" name="mod" value="portal"
EOF;
 if(CURSCRIPT == 'portal') { 
$slist[portal] .= <<<EOF
 checked="checked"
EOF;
 } 
$slist[portal] .= <<<EOF
 /><label for="mod_article" title="搜索文章">文章</label></li>
EOF;
?><? } if($_G['setting']['search']['forum']['status'] && ($_G['group']['allowsearch'] & 2 || $_G['adminid'] == 1)) { ?><?
$slist[forum] = <<<EOF
<li><input type="radio" id="mod_thread" class="pr" name="mod" value="forum"
EOF;
 if(CURSCRIPT == 'forum' && !$_G['fid']) { 
$slist[forum] .= <<<EOF
 checked="checked"
EOF;
 } 
$slist[forum] .= <<<EOF
 /><label for="mod_thread" title="搜索{$_G['setting']['navs']['2']['navname']}">{$_G['setting']['navs']['2']['navname']}</label></li>
EOF;
?><? } if($_G['setting']['search']['blog']['status'] && ($_G['group']['allowsearch'] & 4 || $_G['adminid'] == 1)) { ?><?
$slist[blog] = <<<EOF
<li><input type="radio" id="mod_blog" class="pr" name="mod" value="blog"
EOF;
 if(CURSCRIPT == 'home' && $do != 'album') { 
$slist[blog] .= <<<EOF
 checked="checked"
EOF;
 } 
$slist[blog] .= <<<EOF
 /><label for="mod_blog" title="搜索日志">日志</label></li>
EOF;
?><? } if($_G['setting']['search']['album']['status'] && ($_G['group']['allowsearch'] & 8 || $_G['adminid'] == 1)) { ?><?
$slist[album] = <<<EOF
<li><input type="radio" id="mod_album" class="pr" name="mod" value="album"
EOF;
 if(CURSCRIPT == 'home' && $do == 'album') { 
$slist[album] .= <<<EOF
 checked="checked"
EOF;
 } 
$slist[album] .= <<<EOF
 /><label for="mod_album" title="搜索相册">相册</label></li>
EOF;
?><? } if($_G['setting']['groupstatus'] && $_G['setting']['search']['group']['status'] && ($_G['group']['allowsearch'] & 16 || $_G['adminid'] == 1)) { ?><?
$slist[group] = <<<EOF
<li><input type="radio" id="mod_group" class="pr" name="mod" value="group"
EOF;
 if(CURSCRIPT == 'group' || $_G['basescript']=='group') { 
$slist[group] .= <<<EOF
 checked="checked"
EOF;
 } 
$slist[group] .= <<<EOF
 /><label for="mod_group" title="搜索{$_G['setting']['navs']['3']['navname']}">{$_G['setting']['navs']['3']['navname']}</label></li>
EOF;
?><? } ?><?
$slist[user] = <<<EOF
<li><input type="radio" id="mod_user" class="pr" name="mod" value="user" /><label for="mod_user" title="搜索用户">用户</label></li>
EOF;
?>
<? if($slist) { ?>
<div id="sc" class="y">
<form id="scform" method="post" autocomplete="off" onsubmit="searchFocus($('srchtxt'))" action="<?=$_G['siteurl']?>search.php?searchsubmit=yes" target="_blank">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<input type="hidden" name="srchtype" value="title" />
<input type="hidden" name="srhfid" value="<?=$_G['fid']?>" />
<table cellspacing="0" cellpadding="0">
<tr>
<td><a href="search.php" target="_blank" id="sctype" class="showmenu" onclick="showMenu(this.id);return false;">搜索</a></td>
<td><input type="text" name="srchtxt" id="srchtxt" class="px z" value="请输入搜索内容" autocomplete="off" onfocus="searchFocus(this);" onblur="searchBlur(this);" /></td>
<td><button id="search_submit" name="searchsubmit" type="submit" value="true" class="xw1">搜索</button></td>
</tr>
</table>
<div id="sctype_menu" class="p_pop cl" style="display: none">
<ul><? echo implode('', $slist);; ?></ul>
</div>
</form>
<script type="text/javascript">initSearchmenu();</script>
</div>
<? } } ?><div class="z"><a href="./" class="nvhm" title="首页"><?=$_G['setting']['bbname']?></a> <em>&rsaquo;</em> <?=$navigation?></div>
</div>
<div id="ct" class="wp cl">
<div class="mn">
<div class="bm bw0">
<? } ?>

<div style="display: none">
<ul id="fs_group"><?=$grouplist?></ul>
<ul id="fs_forum_common"><?=$commonlist?></ul><? if(is_array($forumlist)) foreach($forumlist as $forumid => $forum) { ?><ul id="fs_forum_<?=$forumid?>"><?=$forum?></ul>
<? } if(is_array($subforumlist)) foreach($subforumlist as $forumid => $forum) { ?><ul id="fs_subforum_<?=$forumid?>"><?=$forum?></ul>
<? } ?>
</div>
<h3 class="flb">
<? if($special === null) { ?>
<em>论坛导航</em>
<? } else { ?><?
$actiontitle = <<<EOF


EOF;
 if($special == 1) { 
$actiontitle .= <<<EOF
发起投票

EOF;
 } elseif($special == 2) { 
$actiontitle .= <<<EOF
出售商品

EOF;
 } elseif($special == 3) { 
$actiontitle .= <<<EOF
发布悬赏

EOF;
 } elseif($special == 4) { 
$actiontitle .= <<<EOF
发起活动

EOF;
 } elseif($special == 5) { 
$actiontitle .= <<<EOF
发起辩论

EOF;
 } else { 
$actiontitle .= <<<EOF
发新帖

EOF;
 } 
$actiontitle .= <<<EOF


EOF;
?>
<em><?=$actiontitle?></em>
<? } if(!empty($_G['gp_infloat'])) { ?>
<span>
<a href="javascript:;" class="flbc" onclick="hideWindow('nav')" title="关闭">关闭</a>
</span>
<? } ?>
</h3>
<div class="c"<? if(empty($_G['gp_infloat'])) { ?> style="width: 620px;"<? } ?>>
<p class="cl">
<? if($_G['group']['allowpost'] || !$_G['uid']) { if($special === null) { ?>
<button id="postbtn" class="pn pnc y" onclick="hideWindow('nav');showWindow('newthread', 'forum.php?mod=post&action=newthread&fid=' + selectfid)" disabled="disabled"><span>发新帖</span></button>
<? } else { ?>
<button id="postbtn" class="pn pnc y" onclick="hideWindow('nav');window.location.href='forum.php?mod=post&action=newthread&fid=' + selectfid + '&special=<?=$_G['gp_special']?>'" disabled="disabled"><span><?=$actiontitle?></span></button>
<? } } ?>
<span class="pbnv"><?=$_G['setting']['bbname']?><span id="pbnv"></span> <a id="enterbtn" class="xi2" href="javascript:;" onclick="locationforums(currentblock, currentfid)">[进入版块]</a></span>
</p>
<ul class="pbl cl">
<li id="block_group"></li>
<li id="block_forum"></li>
<li id="block_subforum"></li>
</ul>
</div>

<script type="text/javascript" reload="1">
var s = '<? if($commonfids) { ?><p><a id="commonforum" href="javascript:;" onclick="switchforums(this, 1, \'common\')" class="pbsb lightlink">常用版块</a></p><? } ?>';
var lis = $('fs_group').getElementsByTagName('LI');
for(i = 0;i < lis.length;i++) {
var gid = lis[i].getAttribute('fid');
if($('fs_forum_' + gid)) {
s += '<p><a href="javascript:;" ondblclick="locationforums(1, ' + gid + ')" onclick="switchforums(this, 1, ' + gid + ')" class="pbsb">' + lis[i].innerHTML + '</a></p>';
}

}
$('block_group').innerHTML = s;
var lastswitchobj = null;
var selectfid = 0;
var switchforum = switchsubforum = '';

switchforums($('commonforum'), 1, 'common');

function switchforums(obj, block, fid) {
if(lastswitchobj != obj) {
if(lastswitchobj) {
lastswitchobj.parentNode.className = '';
}
obj.parentNode.className = 'pbls';
}
var s = '';
if(fid != 'common') {
$('enterbtn').removeAttribute("disabled");
currentblock = block;
currentfid = fid;
} else {
$('enterbtn').setAttribute("disabled", "disabled");
}
if(block == 1) {
var lis = $('fs_forum_' + fid).getElementsByTagName('LI');
for(i = 0;i < lis.length;i++) {
fid = lis[i].getAttribute('fid');
if(fid != '') {
s += '<p><a href="javascript:;" ondblclick="locationforums(2, ' + fid + '\)" onclick="switchforums(this, 2, ' + fid + ')"' + ($('fs_subforum_' + fid) ?  ' class="pbsb"' : '') + '>' + lis[i].innerHTML + '</a></p>';
}
}
$('block_forum').innerHTML = s;
$('block_subforum').innerHTML = '';
switchforum = switchsubforum = '';
selectfid = 0;
$('postbtn').setAttribute("disabled", "disabled");
} else if(block == 2) {
selectfid = fid;
if($('fs_subforum_' + fid)) {
var lis = $('fs_subforum_' + fid).getElementsByTagName('LI');
for(i = 0;i < lis.length;i++) {
fid = lis[i].getAttribute('fid');
s += '<p><a href="javascript:;" ondblclick="locationforums(3, ' + fid + ')" onclick="switchforums(this, 3, ' + fid + ')">' + lis[i].innerHTML + '</a></p>';
}
$('block_subforum').innerHTML = s;
} else {
$('block_subforum').innerHTML = '';
}
switchforum = obj.innerHTML;
switchsubforum = '';
$('postbtn').removeAttribute("disabled");
} else {
selectfid = fid;
switchsubforum = obj.innerHTML;
$('postbtn').removeAttribute("disabled");
}
lastswitchobj = obj;
$('pbnv').innerHTML = switchforum ? '&nbsp;&gt;&nbsp;' + switchforum + (switchsubforum ? '&nbsp;&gt;&nbsp;' + switchsubforum : '') : '';
}

function locationforums(block, fid) {
location.href = block == 1 ? 'forum.php?gid=' + fid : 'forum.php?mod=forumdisplay&fid=' + fid;
}

</script>

<? if(empty($_G['gp_infloat'])) { ?>
</div>
</div>
</div>
<? } include template('common/footer'); ?>