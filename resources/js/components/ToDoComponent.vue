<template>
    <div class="container">
        <h1>TODO</h1>
        <form class="form">
            <input v-model="input">
            <button type="button">Submit</button>
        </form>
        <ul class="list">
            <li v-for="(item,index) in list" :key="index">
                {{item.title}} <span class="delete" @click="del">Hapus</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default ({
    data() {
        return{
            list:[
                  {
                    title:"menyapu"
                },
                {
                    title:"menyapu"
                }
            ],
            Input:""
        
        }
              
    },
})
</script>
