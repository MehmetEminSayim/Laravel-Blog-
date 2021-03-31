<?php

function getUserData($val){
    return Auth::user()->$val;
}



function limit_text($text, $limit)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}


function dateTimeFormat($date)
{
    setlocale(LC_TIME, "Turkish");
    return strftime('%d %B %Y', strtotime($date));
}


function fileUploads($input, $path)
{
    $ci =& get_instance();
    $file_name = pathinfo($_FILES[$input]["name"], PATHINFO_FILENAME) . "." . pathinfo($_FILES[$input]["name"], PATHINFO_EXTENSION);
    $config["allowed_types"] = "jpg|jpeg|png|jfif";
    $config["upload_path"] = $path;
    $config['encrypt_name'] = TRUE;

    $ci->load->library("upload", $config);
    $upload = $ci->upload->do_upload($input);

    if ($upload) {
        $uploaded_file = $ci->upload->data("file_name");
        return $uploaded_file;
    }
    return false;

}

function sweatAlert($route,$val){
    echo "<script>";
    echo '
		$(\' '.'.'.$val .' \').click(function (){
		var id = $(this).attr(\'data-id\');

		Swal.fire({
			title: \'Emin misiniz?\',
			text: "İşlem Tamamlamak için son bir adım kaldı?",
			showCancelButton: true,
			confirmButtonColor: \'#3085d6\',
			cancelButtonColor: \'#d33\',
			confirmButtonText: \'Evet Eminim !\',
			cancelButtonText: \'İptal\'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: \'POST\',
					url:   \' '.route($route) .' \',
					data: {
					id: id,
					},
					success: function(result) {
					Swal.fire({
							position: \'top-end\',
							icon: \'success\',
							title: \'İşlem başarılı.\',
							showConfirmButton: false,
							timer: 1500
						})
						setTimeout(function(){
							location.reload()
						}, 2000);

					},

				});
			}
		})

	})
	';
    echo "</script>";
}

function verticalTable($settings)
{
    $named_settings = [];
    foreach ($settings as $setting) {
        $named_settings[$setting->name] = $setting;
    }
    return $named_settings;
}


function subCategori ($elements, $parentId = 0){
    $branch = array();
    foreach ($elements as $element){
        if ($element->parent_id == $parentId){
            $children = subCategori($elements, $element->id);
            if ($children){
                $element->children = $children;
            }else{
                $element->children = array();
            }
            $branch[] = $element;
        }
    }
    return $branch;
}

function draweElement($items){
    echo "<ul class='list list-square mb-0'>";
    foreach ($items as $item){
        echo "<li class=' '> <span style='font-size: 18px'>{$item->title} </span>&nbsp;
                       <a class='aItem'  href='category/updateForm/$item->id'>Edit</a> &nbsp;
                       <a class='aItem'  href='category/deleteData/$item->id'>Delete</a> &nbsp;
                  </li>";
        if (sizeof($item->children) > 0){
            draweElement($item->children);
        }
    }
    echo "</ul>";
}
