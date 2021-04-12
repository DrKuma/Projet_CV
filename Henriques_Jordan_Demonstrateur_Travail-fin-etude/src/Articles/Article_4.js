import React, { Component } from "react";
import * as firebase from 'firebase';
import {DB_CONFIG} from '../Config/Config';


class Article_4 extends Component {
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
      return <div><h1 key={"ia9vXzKgnGHzWgPCTWvY"}>{this.state.Articles["ia9vXzKgnGHzWgPCTWvY"].titre}</h1>
                  <p key={"ia9vXzKgnGHzWgPCTWvY"}>{this.state.Articles["ia9vXzKgnGHzWgPCTWvY"].contenue}</p>
              </div>

    }
    
}

 
export default Article_4;