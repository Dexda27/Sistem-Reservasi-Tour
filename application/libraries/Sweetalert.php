<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Sweetalert
{

	function __construct()
	{
		$this->CI =& get_instance();
	}
	public function alert($icon, $title, $text, $footer, $timer)
	{
		return '
		<script>
		$(document).ready(function(){
			Swal.fire({
				icon: "' . $icon . '",
				title: "' . $title . '",
				text: "' . $text . '",
				showCancelButton: false,
				showConfirmButton: false,
				footer : "' . $footer . '",
				timer : ' . $timer . ',
				});
				});
				</script>';
	}
	public function toastr_success($title, $text)
	{
		return '<script>
				$(document).ready(function(){
					toastr.success("' . $text . '", "' . $title . '", {
						closeButton: true,
						tapToDismiss: false,
						progressBar: true
						});
						});
						</script>';
	}

	public function toastr_error($title, $text)
	{
		return '<script>
						$(document).ready(function(){
							toastr.error("' . $text . '", "' . $title . '", {
								closeButton: true,
								tapToDismiss: false,
								progressBar: true
								});
								});
								</script>';
	}
}
