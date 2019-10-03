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
                        {{task}}
                        <td>{{task.absolute_day}}</td><td>{{task.name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
    export default {
        name:'Project_Tasks_Page',
        props:['tasks','stories'],
        data(){
            return{

            }
        },
        computed:{
            previewTableSorted(){
                let tasks = JSON.parse(this.tasks);
                console.log(this.stories);

                tasks.sort((a,b)=>(a.absolute_day>b.absolute_day)?1:-1);
            return tasks;
            },
            ArrangeTask(){
                console.log(this.previewTableSorted);
                let preArrange = this.previewTableSorted;
                // sort stories
                preArrange.map((res)=>{


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
