<?php
 abstract class __content_antispam {public function switchSpamStatus() {$v6a7f245843454cf4f28ad7c5e2572aa2 = getRequest('element');if(!is_array($v6a7f245843454cf4f28ad7c5e2572aa2)) {$v6a7f245843454cf4f28ad7c5e2572aa2 = array($v6a7f245843454cf4f28ad7c5e2572aa2);}$v6b74acd09751fe70bb35a8c8abf5e510 = (int) getRequest('spam-status');foreach($v6a7f245843454cf4f28ad7c5e2572aa2 as $v7552cd149af7495ee7d8225974e50f80) {$v8e2dcfd7e7e24b1ca76c1193f645902b = $this->expectElement($v7552cd149af7495ee7d8225974e50f80, false, true);$v8e2dcfd7e7e24b1ca76c1193f645902b->is_spam = ($v8e2dcfd7e7e24b1ca76c1193f645902b->is_spam == 2) ? 1 : 2;$v8e2dcfd7e7e24b1ca76c1193f645902b->commit();}$this->setDataType("list");$this->setActionType("view");$v8d777f385d3dfec8815d20f7496026dc = $this->prepareData($v6a7f245843454cf4f28ad7c5e2572aa2, "pages");$this->setData($v8d777f385d3dfec8815d20f7496026dc);return $this->doData();}public function checkAllMessages() {$vaaabf0d39951f3e6c3e8a7911df524c2 = antiSpamService::get();if(!$vaaabf0d39951f3e6c3e8a7911df524c2) return;$v8be74552df93e31bbdd6b36ed74bdb6a = new selector('pages');$v8be74552df93e31bbdd6b36ed74bdb6a->types->name('comments', 'comment');$v8be74552df93e31bbdd6b36ed74bdb6a->types->name('forum', 'message');$v8be74552df93e31bbdd6b36ed74bdb6a->where('is_spam')->isNull();foreach($v8be74552df93e31bbdd6b36ed74bdb6a->result() as $v71860c77c6745379b0d44304d66b6a13) {$vaaabf0d39951f3e6c3e8a7911df524c2->setNick(null);$vaaabf0d39951f3e6c3e8a7911df524c2->setLink($v71860c77c6745379b0d44304d66b6a13->link);$vaaabf0d39951f3e6c3e8a7911df524c2->setContent($v71860c77c6745379b0d44304d66b6a13->content);$v71860c77c6745379b0d44304d66b6a13->is_spam = ($vaaabf0d39951f3e6c3e8a7911df524c2->isSpam()) ? 2 : 1;$v71860c77c6745379b0d44304d66b6a13->commit();}}};?>