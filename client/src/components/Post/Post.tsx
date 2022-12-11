import {ChangeEvent, Dispatch, FormEvent, SetStateAction, useEffect, useRef, useState} from "react";
import {btoa} from "buffer";
import { IPost } from "../../types/Post";

export interface formDataInterface {
    title: string,
    content: string,
}

export default function Post({ title, content}: IPost) {



    return (
      <div className="container">
      <div className="row">
          <div className="col-md-8">
              <div className="media g-mb-30 media-comment">
                  <div className="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                    <div className="g-mb-15">
                      <h1 className="h5 g-color-gray-dark-v1 mb-0">{title}</h1>
                    </div>
                    <p>{content}</p>
                  </div>
              </div>
          </div>
      </div>
    </div>
  
    )
}
