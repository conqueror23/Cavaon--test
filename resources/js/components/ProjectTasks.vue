<template>
    <div class="wrapper">
        <div>
            <h2>Task Remove</h2>
            <div class="content-card">
                <span></span>
                <span>Day</span>
                <span>Type</span>
                <span>Task/Story Name</span>
            </div>
            <div class="content-card" >
                <span></span>
                <span>Day</span>
                <span>Type</span>
                <span>Task/Story Name</span>
            </div>
            {{ArrangeTask}}
        </div>
        <div>
            <h2> Preview</h2>
            <table >
                <thead>
                <th> Absolute Day</th><th> Name</th>
                </thead>
                <tbody>
                    <tr v-for="task in previewTableSorted">
                        <td>{{task.order}}</td><td>{{task.name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>

    const searchTask =(value,obj)=>{
        for(let i =0;i<obj.length;i++){
            if(obj[i].task==value){
                return obj[i];
            }
        }
    }
    export default {
        name:'Project_Tasks_Page',
        props:['tasks','storerefarray'],
        data(){
            return{
            }
        },
        computed:{
            previewTableSorted(){
                let tasks = JSON.parse(this.tasks);
                let storeRef = JSON.parse(this.storerefarray);
                // generate new order
                let preorderList =tasks;
                preorderList.map(list=>{
                    let temp = searchTask(list.name,storeRef);
                    if(temp){
                        list.order = list.absolute_day +temp.relative_day;
                        list.story = temp.story;
                    }else {
                        list.order = list.absolute_day;
                        list.story = null;
                    }
                })
                preorderList.sort((a,b)=>(a.order>b.order)?1:-1);
            return preorderList;
            },
            ArrangeTask(){
                let preArrange = this.previewTableSorted;
                // reorganise
                console.log(preArrange);
                preArrange.map((res)=>{
                    if()
                })
            },
        }
    }
</script>
<style>
    table,tr{
        border: 1px solid black;
    }
    table th{
        background: lightblue;
        color: white;
        padding:0.4em;
    }
    table tr{
        text-align: center;

    }
    .wrapper{
        display: flex;
        flex:1;
        justify-content: space-around;
    }

</style>
