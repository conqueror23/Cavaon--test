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
            <draggable
                :list="reOrder"
                :move="checkMove"
                @start ="dragging=false"
                @end="dragging=true"
                ghost-class="ghost"
            >
                <div
                    class ='records'
                    v-for="(task,index) in reOrder"
                    :key="task.id"
                >
                    <div v-if="task.story!==null">

                        <div>BBBB</div> <div>{{task.absolute_day}}</div>  <div> <input type="text" :placeholder="task.story" disabled></div>
                    </div>
                    <div v-else>
                        <div>BBBB</div> <div>{{task.absolute_day}}</div>  <div> <input type="text" :placeholder="task.name" v-model="reOrder[index].name"></div>
                    </div>
                </div>
            </draggable>
            <input type="button"  @click="upLoadStatic" value="Submit"/>

            {{ArrangeTask}}
        </div>
        <div>
            <h2> Preview</h2>
            <table >
                <thead>
                <th> Absolute Day</th><th> Name</th>
                </thead>
                <tbody>
                    <tr v-for="(task,index) in reOrder">
                        <td>{{index+1}}</td><td>{{task.name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import draggable from 'vuedraggable'

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
                list.relative_day = temp.relative_day;
            }else {
                list.story = null;
                list.relative_day = null;
            }
        })
        return obj
    }

    export default {
        name:'Project_Tasks_Page',
        props:['tasks','storerefarray'],
        components:{
          draggable
        },
        data(){
            return{
                reOrder:[],
            }
        },
        computed:{
            previewTableSorted(){
                let tasks = JSON.parse(this.tasks);
                let storeRef = JSON.parse(this.storerefarray);
                let preorderList =addStoreCol(tasks,storeRef);

                // preorderList.sort((a,b)=>(a.absolute_day>b.absolute_day)?1:-1);
                console.log(preorderList)
                this.reOrder =preorderList;
            return preorderList;
            },
            ArrangeTask(){
                let preArrange = this.previewTableSorted;
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
        },
        methods:{
            checkMove: function(e) {
                window.console.log("Future index: " + e.draggedContext.futureIndex);
            },
            upLoadStatic:function(){
                // console.log(this.reOrder);
                let upload =  [];
                this.reOrder.map((record,index)=>{
                    let temp = {};
                    temp.id =record['id'];
                    temp.project_id =record['project_id'];
                    temp.absolute_day =index+1;
                    temp.name =record['name'];
                    temp.story_id =record['story_id'];
                    upload.push(temp)
                })
                //submit sessions
                //upload is need to submit

                console.log(upload);
            }
        }
    }
</script>
<style>

    draggable{
        display: flex;
    }
    .records{
        display: flex;
        flex: 1;
        flex-wrap: nowrap;
    }
    .records>div{
        display:flex;
        flex:1;
        justify-content: space-between;

    }
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
        justify-content: space-between;
    }
    .ghost {
        opacity: 0.5;
        background: #c8ebfb;
    }
</style>
