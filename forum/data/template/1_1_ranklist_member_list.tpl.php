<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if($list) { if($select_form) { ?>
<p class="tbmu">
排序：
<select id="mySelect" onchange="select_form()">
  <option value="uid" <?=$order_selected['uid']?>>按注册时间</option>
  <option value="posts" <?=$order_selected['posts']?>>按发帖总数</option>
  <option value="blogs" <?=$order_selected['blogs']?>>按日志总数</option>
  <option value="credits" <?=$order_selected['credits']?>>按积分总数</option>
</select>
<script type="text/javascript">
function select_form() {
x = $('mySelect');
y = x.options[x.options.selectedIndex].value;
location.href = location.href.replace(/\&select.*/, '') +  '&select=' + y;
}
</script>
</p>
<? } if($postsrank_change) { ?>
<p id="orderby" class="tbmu">
<a href="misc.php?mod=ranklist&amp;type=member&amp;view=post&amp;orderby=posts" id="posts"<? if($now_choose == 'posts') { ?> class="a"<? } ?>>发帖数</a><span class="pipe">|</span>
<a href="misc.php?mod=ranklist&amp;type=member&amp;view=post&amp;orderby=digestposts" id="digestposts"<? if($now_choose == 'digestposts') { ?> class="a"<? } ?>>精华数</a><span class="pipe">|</span>
<a href="misc.php?mod=ranklist&amp;type=member&amp;view=post&amp;orderby=thismonth" id="thismonth"<? if($now_choose == 'thismonth') { ?> class="a"<? } ?>>最近30天发帖数</a><span class="pipe">|</span>
<a href="misc.php?mod=ranklist&amp;type=member&amp;view=post&amp;orderby=today" id="today"<? if($now_choose == 'today') { ?> class="a"<? } ?>>最近24小时发帖数</a>
</p>
<? } ?>
<div class="xld xlda hasrank"><? if(is_array($list)) foreach($list as $key => $value) { ?><dl class="bbda cl">
<dd class="ranknum"><? if($value['rank'] <= 3) { ?><img src="<?=IMGDIR?>/rank_<?=$value['rank']?>.gif" alt="<?=$value['rank']?>" /><? } else { ?><?=$value['rank']?><? } ?></dd>
<dd class="m avt"><a href="home.php?mod=space&amp;uid=<?=$value['uid']?>" target="_blank" c="1"><?php echo avatar($value[uid],small); ?></a></dd>
<dt class="y">
<p class="xw0"><a href="home.php?mod=space&amp;uid=<?=$value['uid']?>" target="_blank">去串个门</a></p>
<p class="xw0"><a href="home.php?mod=spacecp&amp;ac=poke&amp;op=send&amp;uid=<?=$value['uid']?>" id="a_poke_<?=$key?>" onclick="showWindow(this.id, this.href, 'get', 0);" title="打个招呼">打个招呼</a></p>
<p class="xw0"><a href="home.php?mod=spacecp&amp;ac=pm&amp;op=showmsg&amp;handlekey=showmsg_<?=$value['uid']?>&amp;touid=<?=$value['uid']?>&amp;pmid=0&amp;daterange=2" id="a_sendpm_<?=$key?>" onclick="showWindow('showMsgBox', this.href, 'get', 0)">发送消息</a></p>
<? if(isset($value['isfriend']) && !$value['isfriend']) { ?><p class="xw0"><a href="home.php?mod=spacecp&amp;ac=friend&amp;op=add&amp;uid=<?=$value['uid']?>" id="a_friend_<?=$key?>" onclick="showWindow('friend_<?=$key?>', this.href, 'get', 0)" title="加为好友">加为好友</a></p><? } ?>
</dt>
<dt>
<a href="home.php?mod=space&amp;uid=<?=$value['uid']?>" target="_blank"<?php g_color($value[groupid]); ?>><?=$value['username']?></a>
<? if($ols[$value['uid']]) { ?><img src="<?=IMGDIR?>/ol.gif" alt="online" title="在线" class="vm" /> <? } ?>
</dt>
<dd>
<p>
<?=$_G['cache']['usergroups'][$value['groupid']]['grouptitle']?> <?php g_icon($value[groupid]); if($value['credits']) { ?>积分数: <?=$value['credits']?><? } if($value['extcredits']) { ?><?=$extcredits[$now_choose]['title']?>: <?=$value['extcredits']?> <?=$extcredits[$now_choose]['unit']?><? } if($value['posts']) { ?>帖子数: <a href="home.php?mod=space&amp;uid=<?=$value['uid']?>&amp;do=thread&amp;view=me&amp;from=space" target="_blank"><?=$value['posts']?></a><? } if($value['blogs']) { ?>日志数: <a href="home.php?mod=space&amp;uid=<?=$value['uid']?>&amp;do=blog&amp;view=me&amp;from=space" target="_blank"><?=$value['blogs']?></a><? } if($value['views']) { ?>人气: <?=$value['views']?><? } ?>
</p>

<? if($value['friends']) { ?><p>好友数: <?=$value['friends']?></p><? } if($value['lastactivity']) { ?><p>最后活跃: <?=$value['lastactivity']?></p><? } if($value['unitprice']) { ?><p>竞价单价: <span id="<? if($value['uid'] == $_G['uid']) { ?>show_unitprice<? } ?>"><?=$value['unitprice']?></span><? if($value['uid'] == $_G['uid']) { ?>&nbsp;<a href="home.php?mod=spacecp&amp;ac=common&amp;op=modifyunitprice" id="a_modify_unitprice" onclick="showWindow(this.id, this.href, 'get', 0);">(修改)</a><? } ?></p><? } if($value['show_credit']) { ?><p>剩余竞价<?=$extcredits[$creditid]['title']?>: <?=$value['show_credit']?> <?=$extcredits[$creditid]['unit']?></p><? } if($value['show_note']) { ?><p>竞价宣言: <?=$value['show_note']?></p><? } ?>
</dd>
</dl>
<? } if($multi) { ?><div class="pgs cl mtm"><?=$multi?></div><? } ?>
</div>
<? } else { ?>
<div class="emp">没有相关成员。</div>
<? } if($cachetip) { ?><div class="notice">排行榜数据已被缓存，上次于 <?=$lastupdate?> 被更新，下次将于 <?=$nextupdate?> 进行更新</div><? } ?>