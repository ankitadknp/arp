CKEDITOR.plugins.add('canadaFlagBullet', {
    icons: 'canadaFlagBullet',
    init: function (editor) {
        console.log('Your plugin initialized.');
        editor.ui.addButton('CanadaFlagBullet', {
            label: 'Canada Flag Bullet',
            command: 'canadaFlagBulletCommand',
            toolbar: 'insert',
            icon: this.path + 'customIcon.png',
        });

        editor.addCommand('canadaFlagBulletCommand', {
            exec: function (editor) {
                console.log('Button clicked.');
                var base_url = window.location.origin;
                var finalUrl  = base_url + '/arp-canadapdf/public/plugins/ckeditor/plugins/canadaFlagBullet/customIcon.png';
                // var imageUrl = "{{asset('/plugins/ckeditor/plugins/canadaFlagBullet/customIcon.png')}}";
                var contentToInsert = '<img src="' + finalUrl + '" alt="Canada Flag" class="canada-flag">';
                editor.insertHtml(contentToInsert);
            }
        });
    }
});
