require('./bootstrap');

import {createApp} from 'vue'
import LikePost from "./components/Post/Like"
import ViewPost from "./components/Post/View"
import CommentsPost from "./components/Post/Comments"
const app = createApp({})

app.component('like-post', LikePost)

app.component('view-post', ViewPost)

app.component('comments-post', CommentsPost)

app.mount('#app')
