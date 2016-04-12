 ///membuat nama file upload dengan mengambil no surat melalui model

            // $model->file_surat = UploadedFile::getInstance($model,'file_surat'); //model meminta request untuk mengupload file
            // $model->file_surat->saveAs( 's_masuk/'.$imageName.'.'.$model->file_surat->extension); 
            // //model yang berisi request tersebut disimpan ke dalam direktori file
            // // format penyimpanan nama file diikuti ekstensi file
            // $model->file_surat = $imageName.'.'.$model->file_surat->extension;
            // //ditampilkan ke dalam view sesuai format penyimpanan



  <?= $form->field($model, 'perihal_surat')->dropDownList([ 'undangan' => 'Undangan', 'surat tugas' => 'Surat tugas', 'penetapan SK' => 'Penetapan SK', 'lainnya' => 'Lainnya', ], ['prompt' => '']) ?>

<?= $form->field($model, 'file_surat')->FileInput() ?>
