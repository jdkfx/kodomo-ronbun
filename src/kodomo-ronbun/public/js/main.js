new Vue({
    el: '#upload-img',
    data() {
        return {
            uploadedImage: '',
        };
    },
    methods: {
        onFileChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                this.uploadedImage = e.target.result;
            };
            reader.readAsDataURL(file);
        },
    },
})

new Vue({
    el: '#navigation',
    data: {
        options: [
            { text: '新着', value: '/' },
            { text: 'おすすめ', value: '/' },
            { text: 'カテゴリ', value: '/categories' }
        ]
    },
    methods: {
        jump: function(e){
            location.href = e.target.value;
        }
    }
})
