<template>
    <div>
        <svg @click="eventLike()" :class="className" width="21" height="21" viewBox="0 0 24 24" stroke-width="2">
            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
        </svg>
    </div>
</template>

<script>
export default {
    name: 'LikePost',
    data: () => {
        return {
            active: 0,
            load: true,
            className: ['fill-white stroke-black cursor-pointer hover:opacity-90']
        }
    },
    props: {
        status: {
            type: Number,
            required: true
        },
        id: {
            type: Number,
            required: true
        }
    },
    mounted() {
        this.initActive(this.status)
        this.active = this.status
    },
    methods: {
        eventLike(){
            if(this.load){
                this.load = false
                window.axios.post('/api/like/'+ this.id).then(response => {
                    this.load = true;
                    this.initActive(response.data.status)
                })
            }
        },
        initActive(status){
            if(status === 0){
                this.className = ['fill-white stroke-black cursor-pointer hover:opacity-90']
            }
            if(status === 1){
                this.className = ['fill-red-600 stroke-red-600 cursor-pointer hover:opacity-90']
            }
        }
    }
};
</script>
