import React, { Component } from "react";
import * as firebase from 'firebase';
import {DB_CONFIG} from '../Config/Config';


class Article_2 extends Component {
  constructor(){
    super()

      this.state = {loading: true }
      if (!firebase.apps.length) {
        firebase.initializeApp(DB_CONFIG);
    }
}


componentDidMount () {
    const articlesRef = firebase.database().ref('Articles')

    articlesRef.on('value', snapshot => {
        this.setState({
            Articles: snapshot.val(),
            loading: false
        })
    })
}
      
    render() {
      if (this.state.loading){
          return (
              <p>Je suis entrain de charger</p>
          )
      }

      const Articles = Object.keys(this.state.Articles)
      return <div><h1 key={"1"}>{this.state.Articles["1"].titre}</h1>
                  <p key={"1"}>{this.state.Articles["1"].contenue}</p>
              </div>

    }
    
}

 
export default Article_2;