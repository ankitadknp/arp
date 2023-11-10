CKEDITOR.plugins.add('rightBullet', {
    icons: 'rightBullet',
    init: function (editor) {
        console.log('Your plugin initialized.');
        editor.ui.addButton('RightBullet', {
            label: 'Right Bullet',
            command: 'rightBulletCommand',
            toolbar: 'insert',
            icon: this.path + 'rightIcon.png',
        });

        editor.addCommand('rightBulletCommand', {
            exec: function (editor) {
                console.log('Button clicked.');
                var base_url = window.location.origin;
                var finalUrl  = base_url + '/arp-canadapdf/public/plugins/ckeditor/plugins/rightBullet/rightIcon.png';
                // var imageUrl = "{{asset('/plugins/ckeditor/plugins/canadaFlagBullet/customIcon.png')}}";
                var contentToInsert = '<img src="' + finalUrl + '" alt="Canada Flag" class="canada-flag">';
                editor.insertHtml(contentToInsert);
            }
        });
    }
});
