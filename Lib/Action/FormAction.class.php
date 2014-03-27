<?php
class FormAction extends Action {
	public function insert() {
		$Form = D ( 'Form' );
		if ($Form->create ()) {
			$result = $Form->add ();
			if ($result) {
				$this->success ( '操作成功！' );
			} else {
				$this->error ( '写入错误！' );
			}
		} else {
			$this->error ( $Form->getError () );
		}
	}
	public function insert1() {
		$Form = D ( 'Form' );
		$data ['title'] = 'ThinkPHP';
		$data ['content'] = '表单内容';
		$Form->add ( $data );
	}
	public function insert2() {
		$Form = D ( 'Form' );
		$Form->title = 'ThinkPHP';
		$Form->content = '表单内容';
		$Form->add ();
	}
	public function read($id = 0) {
		$Form = M ( 'Form' );
		// 读取数据
		$data = $Form->find ( $id );
		if ($data) {
			$this->data = $data; // 模板变量赋值
		} else {
			$this->error ( '数据错误' );
		}
		
		$this->title = $Form->where ( 'id=' + $id )->getField ( 'title' );
		
		$this->display ();
	}
	public function edit($id = 0) {
		$Form = M ( 'Form' );
		$this->vo = $Form->find ( $id );
		$this->display ();
	}
	public function update() {
		$Form = D ( 'Form' );
		if ($Form->create ()) {
			$result = $Form->save ();
			if ($result) {
				$this->success ( '操作成功！' );
			} else {
				$this->error ( '写入错误！' );
			}
		} else {
			$this->error ( $Form->getError () );
		}
	}
	public function update1() {
		$Form = M ( "Form" );
		// 要修改的数据对象属性赋值
		$data ['id'] = 5;
		$data ['title'] = 'ThinkPHP';
		$data ['content'] = 'ThinkPHP3.1版本发布';
		$Form->save ( $data ); // 根据条件保存修改的数据
	}
	public function update2() {
		$Form = M ( "Form" );
		// 要修改的数据对象属性赋值
		$data ['title'] = 'ThinkPHP';
		$data ['content'] = 'ThinkPHP3.1版本发布';
		$Form->where ( 'id=5' )->save ( $data ); // 根据条件保存修改的数据
	}
	public function update3() {
		$Form = M ( "Form" );
		// 要修改的数据对象属性赋值
		$Form->title = 'ThinkPHP';
		$Form->content = 'ThinkPHP3.1版本发布';
		$Form->where ( 'id=5' )->save (); // 根据条件保存修改的数据
	}
	/**
	 * 有些时候，我们只需要修改某个字段的值，就可以使用setField方法，而不需要每次都调用save方法。
	 */
	public function update4() {
		$Form = M ( "Form" );
		// 更改title值
		$Form->where ( 'id=5' )->setField ( 'title', 'ThinkPHP' );
	}
	/**
	 * 对于统计字段，系统还提供了更加方便的setInc和setDec方法。
	 */
	public function update5() {
		$User = M ( "User" ); // 实例化User对象
		$User->where ( 'id=5' )->setInc ( 'score', 3 ); // 用户的积分加3
		$User->where ( 'id=5' )->setInc ( 'score' ); // 用户的积分加1
		$User->where ( 'id=5' )->setDec ( 'score', 5 ); // 用户的积分减5
		$User->where ( 'id=5' )->setDec ( 'score' ); // 用户的积分减1
	}
	public function delete($id = 0) {
		$Form = M ( 'Form' );
		if ($Form->delete($id)) {
			$this->message= '删除成功！' ;
		} else {
			$this->message= '删除错误！' ;
		}
		$this->display('echo/echo');
	}
	public function delete1($id = 0) {
		$User = M ( "User" ); // 实例化User对象
		$User->where ( 'id=5' )->delete (); // 删除id为5的用户数据
		$User->delete ( '1,2,5' ); // 删除主键为1,2和5的用户数据
		$User->where ( 'status=0' )->delete (); // 删除所有状态为0的用户数据
	}
}