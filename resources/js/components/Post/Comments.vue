<template>
    <div class="mt-5">
        <div class="grid gap-4" >
            <h3 class="font-semibold text-[19px]">Оставить комментарий</h3>
            <form v-on:submit.prevent="submitEvent()" class="grid grid-cols-1 gap-4" v-if="formActive === true">
                <div class="grid grid-cols-1 gap-1">
                    <label for="title">Тема сообщения <span class="text-red-600">*</span></label>
                    <div v-if="errors.find(v => v.id === 'title')" class="text-red-600 text-[12px]">{{errors.find(v => v.id === 'title').text}}</div>
                    <input class="p-2 border border-gray-300 rounded" id="title" type="text" v-model="title">
                </div>
                <div class="grid grid-cols-1 gap-1">
                    <label for="message">Текст сообщения <span class="text-red-600">*</span></label>
                    <div v-if="errors.find(v => v.id === 'message')" class="text-red-600 text-[12px]">{{errors.find(v => v.id === 'message').text}}</div>
                    <textarea class="p-2 border border-gray-300 rounded" id="message" rows="6" v-model="message"></textarea>
                </div>
                <div>
                    <button type="submit" class="text-[13px] hover:opacity-80 rounded text-white font-medium uppercase pb-[8px] pt-[9px] px-6 bg-blue-500">Отправить</button>
                </div>
            </form>
            <div v-if="formActive === false">
                <div class="border border-green-500 bg-green-50 text-black rounded-md p-3 mb-5">
                    <span class="text-green-700 text-sm">Ваше сообщение успешно отправлено</span>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-5 mt-[30px]" v-if="comments.length !== 0">
            <div v-for="comment in comments" :key="comment.id">
                <div class="flex gap-2">
                    <span class="font-semibold">Тема:</span>
                    <span>{{comment.title}}</span>
                </div>
                <div>
                    <span class="font-semibold">Сообщения:</span>
                    <div>{{comment.message}}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CommentsPost',
    data: () => {
        return {
            comments: [],
            title: '',
            message: '',
            errors: [],
            formActive: true
        }
    },
    props: {
        result: {
            type: Object,
            required: true
        },
        id: {
            type: Number,
            required: true
        }
    },
    mounted() {
        this.comments = this.result
    },
    methods: {
        submitEvent(){
            this.errors = []
            if(this.title.length === 0) {
                this.errors.push({id: 'title', text: 'Введите тему сообщения.'})
            }
            if(this.message.length === 0){
                this.errors.push({id: 'message', text: 'Введите тему сообщения.'})
            }
            if(this.errors.length === 0) {
                window.axios.post('/api/comment/create/' + this.id, {
                    title: this.title,
                    message: this.message
                }).then(res => {
                    this.formActive = false;
                    this.title = '';
                    this.message = '';
                    this.comments.unshift(res.data)
                });
            }
        },
        errorMessage(key){
            const mes = this.errors.find(v => v.id === key)
            if(mes === null) return ""
            return mes.text
        }
    }
};
</script>
