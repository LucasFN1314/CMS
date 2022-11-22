<template>
  <div>
    <div class="file-manager" v-if="public__files == true || all__files == true">
      <div class="subir-archivo" v-if="isLogged() == true">
        <div class="container">
          <div class="content">
            <form action="/api/file/upload" method="POST" enctype="multipart/form-data">
              <input type="file" name="file" />
              <input type="hidden" name="email" :value="user_email()" />
              <button type="submit">Subir archivo</button>
            </form>
          </div>
        </div>
      </div>

      <div class="archivos-subidos">
        <h4>Archivos subidos</h4>
        <a href="#" v-for="file in files" :key="file.id" v-on:click="downloadFile(file.index)">{{ file.name }} -
          {{ file.user }}</a>
      </div>
    </div>

    <div class="own-files" v-if="isLogged() == true && own__files == true">
      <div class="subir-archivo">
        <div class="container">
          <div class="content">
            <form id="own-files-form" action="/api/file/upload" method="POST" enctype="multipart/form-data">
              <input type="file" id="own-file-upload" name="file" style="visibility: hidden;" />
              <input type="hidden" name="email" :value="user_email()" />
            </form>
          </div>
        </div>

      </div>

      <div class="upload-container">

        <button type="button" class="btn btn-outline-dark subir-arhivo" v-on:click="click_uploader('own')">Subir archivo</button>
        <input type="email" readonly class="form-control" id="exampleFormControlInput1" placeholder=""/>
        <button type="submit" class="btn btn-outline-dark subir-arhivo" v-on:click="uploadForm()">Confirmar</button>
      </div>

      <div class="archivos-subidos">
        <h4>Mis archivos</h4>
        <a href="#" v-for="file in own_files" :key="file.id" v-on:click="downloadFile(file.index)">{{ file.name }}</a>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  mounted() {
    this.getfiles();
    if (this.isLogged())
      this.getOwnFiles();
  },
  data() {
    return {
      files: [],
      own_files: [],
    };
  },
  methods: {
    getfiles() {
      axios.post("/api/files/get").then((response) => {
        this.files = response.data;
      });
    },
    getOwnFiles() {
      axios.post('/api/files/user', { email: this.user_email() }).then((response) => {
        this.own_files = response.data;
        console.log("ARCHIVOS: ", this.own_files);
      });
    },
    downloadFile(name) {
      axios.post('/api/file/download', { name: name }).then((response) => { });
    },
    isLogged() {
      return window.auth_user;
    },
    user_email() {
      return window.user_email;
    },
    click_uploader(type){
      if(type=='own'){
        document.getElementById('own-file-upload').click();
      }
    },
    uploadForm() {
      document.getElementById('own-files-form').submit();
    }
  },
  props: ['own__files', 'public__files', 'all__files'],
};
</script>

<style scoped>
.file-manager,
.own-files {
}

.subir-archivo>.container {
  margin: 0;
  padding: 0;
}

.content {
  color: white;
}

form {
  margin-top: 2em;

  display: flex;
  flex-direction: column;
}

button {
  width: 10%;
}

.archivos-subidos {
  display: flex;
  flex-direction: column;

  margin-top: 1em;
  color: white;
}

a {
  padding: 0 !important;
  text-decoration: none;
}


.own-files {
  display: flex;
  flex-direction: column;

  align-items: center;
  justify-content: center;
}

.subir-arhivo {
  width: fit-content;
  padding: .4em;
  color: white;
}

.upload-container {
  width: 100%;

  display: flex;
  justify-content: center;
}

.upload-container>button {
  border:none;
  border-radius: 0%;
}

.upload-container>input {
  width: 30%;
  border-radius: 0%;
}

</style>