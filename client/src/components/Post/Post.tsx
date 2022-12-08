import {ChangeEvent, Dispatch, FormEvent, SetStateAction, useEffect, useRef, useState} from "react";
import {btoa} from "buffer";

export interface formDataInterface {
    title: string,
    content: string,
}

export default function Post() {

    const [formData, setFormData] = useState<formDataInterface>({title: "", content: ""})

    // function loadContents(){
    //   fetch("http://localhost:5656/api/home").then((res) => {
    //     setFormData(res.data.reverse());
    //   })
    // }  

      // useEffect(() => {
      //   loadContents();
      // }, []);

    return (
      <div className="container">
        <h1>tous mes post</h1>
      <div className="row">
          <div className="col-md-8">
              <div className="media g-mb-30 media-comment">

                  <div className="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                    <div className="g-mb-15">
                      <h1 className="h5 g-color-gray-dark-v1 mb-0">John Doe</h1>
                      <span className="g-color-gray-dark-v4 g-font-size-12">5 days ago</span>
                    </div>
              
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                      felis in faucibus ras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                  </div>
              </div>
          </div>
      </div>
    </div>
  
    )
}
