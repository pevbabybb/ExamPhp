<template>
    <div>
        <h1>List users</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, index) in listUsers" :key="user.id">
                    <th scope="row">{{ user.id }}</th>
                    <td v-if="!user.isEdit">
                        {{ user.username }}
                    </td>
                    <td v-else>
                        <input type="text" v-model="selectedUser.username" class="form-control">
                    </td>
                    <td v-if="!user.isEdit">
                        {{ user.email }}
                    </td>
                    <td v-else>
                        <input type="text" v-model="selectedUser.email" class="form-control">
                    </td>
                    <td v-if="!user.isEdit">
                        <button class="btn btn-primary" @click="selectUser(user)">Edit</button>
                    </td>
                    <td v-else>
                        <button class="btn btn-primary" @click="updateuser(index)">Save</button>
                        <button class="btn btn-danger" @click="user.isEdit = false">Cancel</button>
                    </td>
                </tr>
            </tbody>
            
        </table>
    </div>
</template>
<script>
export default {
   data() {
       return {
           user: {
               username:'',
               email:'',
           },
           listUsers:[],
           selectedUser:null,
           error:null
       }
   },
   created() {
       this.getListUsers()
   },
   methods: {
       async getListUsers() {
           try{
               const response = await axios.get('api/user2')
               this.listUsers = response.data
                this.listUsers.forEach(item => {
                        Vue.set(item, 'isEdit', false)
                })
                
               
           } catch(error) {
               this.error = error.response.data
           }
       },
       selectUser (user) {
                user.isEdit = true
				this.selectedUser = { ...user }
			},
			async updateuser(index) {
                try {
                    const response = await axios.put('api/user2/' + this.selectedUser.id, {
                        username: this.selectedUser.name,
                        email: this.selectedUser.price
                    })
                  
                    this.listUsers[index].username = response.data.user.name
                    this.listUsers[index].email = response.data.user.price
                    this.listUsers[index].isEdit = false
                } catch (error) {
                    this.error = error.response.data
                }
			},
      
   },
   

}
</script>