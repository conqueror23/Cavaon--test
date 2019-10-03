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
                        <td>{{task.absolute_day}}</td><td>{{task.name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
// assist functions
    const searchTask =(value,obj)=>{
        for(let i =0;i<obj.length;i++){
            if(obj[i].task==value){
                return obj[i];
            }
        }
    }
    const addStoreCol=(obj,ref)=>{
        obj.map(list=>{
            let temp = searchTask(list.name,ref);
            list.order= list.absolute_day;
            if(temp){
                list.story = temp.story;
            }else {
                list.story = null;
            }
        })
        return obj
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
                let preorderList =addStoreCol(tasks,storeRef);

                preorderList.sort((a,b)=>(a.absolute_day>b.absolute_day)?1:-1);
            return preorderList;
            },
            ArrangeTask(){
                let preArrange = this.previewTableSorted;
                // reorganise
                // console.log(preArrange);
                for(let index =0;index<preArrange.length-1;index++){
                    if(preArrange[index].order ==preArrange[index+1].order ){
                        console.log(preArrange[index+1])
                        if(preArrange[index].story !=null){

                        }
                    // store +1
                        //other record in same store +1
                    //   or random +1
                    }
                }
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
