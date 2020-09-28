<?php 
/**
 * 
 */
class PsPhp extends CI_Controller
{
	const VERSION = '1.0';
	const DATA_APPROVED  = '2012-06-01';
	function __construct()
	{
		parent::_contruct():
	}

	public function index()
	{
		$psPhp = array(
			'psr1.1'	=> 'Code phải sử dụng thẻ <?php hoặc <?=',
			'psr1.2'	=> 'Tên lớp phải có dạng NameClass ví dụ: ClientBuilder, ConnectionFactory ...',
			'psr1.3' 	=> 'Hàm số phải viết HOA, chia ra bởi dấu _ ví dụ: ES_TEST_HOST',
			'psr1.4'	=> 'Tên phương thức của lớp phải để k camelCase, từ đầu tiên viết thường vd: helloWorld',
			'psr1.5' 	=> 'Thuộc tính tùy cách sử dụng viết dạng studyCaps hay camelCase, hay under_scrore, miễn sao thống nhất',
			'psr2.1'	=> 'Code phải tuân thử psr1',
			'psr2.2' 	=> 'Code phải dùng 4 kí tự space để lùi khối',
			'psr2.3' 	=> 'Phải có 1 dòng trắng sau khi khai báo namespace và mỗi khối code',
			'psr2.4' 	=> 'ký tự { khai báo lớp, hàm phải ở dòng tiếp theo, vào đóng phải ở dòng tiếp theo sau thân class',
			'psr2.5' 	=> 'Các từ khóa if, elseif, else phải có 1 khoảng trống sau chúng, gọi hàm, phương thức thì không được làm như vậy.',
			'psr2.6' 	=> 'Mở khối { cho cấu trúc điều kiện phải trên cùng 1 dòng và } ở dòng tiếp theo của thân khối',
			'psr2.7' 	=> 'Hằng số true, false, null phải viết chữ thường',
			'psr2.8'	=> 'Từ khóa extends và implements phải cùng dòng với class.',
			'psr2.9' 	=> 'Keyword var không được sử dụng để khai báo properties',
			'psr2.10'	=> '<!-- <iframe src="https://xuanthulab.net/psr-2-huong-dan-trinh-bay-code-php.html" style="width: 100%"></iframe> -->',
		);
	}

	public function getList()
	{
		
	}

}
 ?>