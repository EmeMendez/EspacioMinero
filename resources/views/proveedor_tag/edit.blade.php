<div id="tags">
    <add-delete-proveedor-tags-component></add-delete-proveedor-tags-component>
</div>
<style>

    .dropdown{
      position: relative;
      width: 100%;
      margin: 0 auto;
    }
    .dropdown-input, .dropdown-selected{
      width: 100%;
      padding: 10px 16px;
      border: 1px solid transparent;
      background: #edf2f7;
      line-height: 1.5em;
      outline: none;
      border-radius: 8px;
    }
    .dropdown-input:focus, .dropdown-selected:hover{
      background: #fff;
      border-color: #e2e8f0;
    }
    .dropdown-input::placeholder{
      opacity: 0.7;
    }
    .dropdown-selected{
      font-weight: bold;
      cursor: pointer;
    }
    .dropdown-list{
      position: absolute;
      width: 100%;
      max-height: 500px;
      margin-top: 4px;
      overflow-y: auto;
      background: #ffffff;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      border-radius: 8px;
    }
    .dropdown-item{
      display: flex;
      width: 100%;
      padding: 11px 16px;
      cursor: pointer;
    }
    .dropdown-item:hover{
      background: #edf2f7;
    }
    .dropdown-item-flag{
      max-width: 16px;
      max-height: 16px;
      margin: auto 12px auto 0px;
  
    }


    </style>