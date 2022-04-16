<template>
    <div class="container">
        <h1>TODO</h1>
        <form class="form">
            <input v-model="input"/>
            <button type="button" @click="addlist">Submit</button>
        </form>
        <ul class="list">
            <li v-for="(item,index) in list" :key="index">
                {{item.title}} <span class="delete" @click="deletelist(index)">Hapus</span>
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
            input:""
        
        }
              
    },

    methods:{
        addlist(){
            let newlist = {
                title: this.input
            }
            this.list.push(newlist)
            this.input = ""
        },

        deletelist(index){
            this.list.splice(index,1)
        }
    }
})
</script>
